<template>
    <table class="table table-hover">
       <thead>
            <tr>
                <th></th>
                <th v-for="tableHead in tableHeads"
                    @click="sortBy(tableHead)"
                    :class="{ active: activeSortKeyName == tableHead.name }">
                    {{ tableHead.name }}
                </th>
            </tr>
       </thead>
       <tbody>
            <scholarship-search-result-item
                v-for="scholarship in filteredTableBody"
                v-bind:key="scholarship.id"
                :scholarship="scholarship"
                @click.native="redirectToScholarshipDetail(scholarship.id)"/>
       </tbody>
    </table>
</template>

<script>

import { mapState } from 'vuex';

export default {
    data: function () {
        let tableHeads = [
            { key: { name: 'university', attr: 'name' }, name: 'University' },
            { key : 'program', name: 'Program' },
            { key: { name: 'program_language', attr: 'language' }, name: 'Language' },
            { key: { name: 'scholarship_type', attr: 'type' }, name: 'Scholarship Category' },
            { key: { name: 'degree_type', attr: 'type' }, name: 'Degree' }
        ];
        let sortOrders = {};

        tableHeads.forEach(function (tableHead) {
            sortOrders[tableHead.key] = 1;
        });

        return {
            tableHeads: tableHeads,
            sortKey: '',
            sortOrders: sortOrders,
            activeSortKeyName: ''
        }
    },
    computed: {
        ...mapState([
            'scholarshipSearchResults'
        ]),
        filteredTableBody: function () {
            var sortKey = this.sortKey;
            var filterKey = this.filterKey && this.filterKey.toLowerCase();
            var order = this.sortOrders[sortKey] || 1;
            var scholarshipSearchResults = this.scholarshipSearchResults;

            if (filterKey) {
                scholarshipSearchResults = scholarshipSearchResults.filter(function (row) {
                    return Object.keys(row).some(function (key) {
                        return String(row[key]).toLowerCase().indexOf(filterKey) > -1;
                    })
                })
            }

            if (sortKey) {
                if (sortKey instanceof Object) {
                    scholarshipSearchResults = scholarshipSearchResults.slice().sort(function (a, b) {
                        a = a[sortKey.name][sortKey.attr];
                        b = b[sortKey.name][sortKey.attr];
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    })
                } else {
                    scholarshipSearchResults = scholarshipSearchResults.slice().sort(function (a, b) {
                        a = a[sortKey];
                        b = b[sortKey];
                        return (a === b ? 0 : a > b ? 1 : -1) * order;
                    })
                }
            }

            return scholarshipSearchResults;
        }
    },
    methods: {
        sortBy: function (tableHead) {
            this.activeSortKeyName = tableHead.name;
            this.sortKey = tableHead.key;
            this.sortOrders[tableHead.key] = this.sortOrders[tableHead.key] * -1;
        },
        redirectToScholarshipDetail: function (scholarshipId) {
            window.open('/scholarship/' + scholarshipId, '_blank');
        }
    }
}
</script>

<style>

</style>
