<template>
    <b-table
        :hover="hover"
        :current-page="1"
        :per-page="5"
        :items="scholarshipSearchResults"
        :fields="fields">

        <template slot="university" slot-scope="row">
            <img :src="row.value.logo" style="width: 5rem; height: 5rem;">
            &nbsp;&nbsp;&nbsp;{{ row.value.name }}
        </template>

    </b-table>
</template>

<script>

import { mapState } from 'vuex';
import bTable from 'bootstrap-vue/es/components/table/table';

export default {
    components: {
        'b-table': bTable
    },
    props: {
        sortable: {
            type: Boolean,
            default: true
        },
        hover: {
            type: Boolean,
            default: true
        }
    },
    data: function () {
        let fields = [
            {
                key: 'university',
                label: 'University',
                sortable: this.sortable,
                'class': 'text-center align-middle'
            },
            {
                key: 'program',
                label: 'Program',
                sortable: this.sortable,
                'class': 'text-center align-middle'
            },
            {
                key: 'degree_type',
                label: 'Degree',
                sortable: this.sortable,
                formatter: (value) => { return value.type; },
                'class': 'text-center align-middle'
            },
            {
                key: 'program_language',
                label: 'Language',
                sortable: this.sortable,
                formatter: (value) => { return value.language; },
                'class': 'text-center align-middle'
            },
            {
                key: 'scholarship_type',
                label: 'Scholarship Category',
                sortable: this.sortable,
                formatter: (value) => { return value.type; },
                'class': 'text-center align-middle'
            },
        ];

        return {
            fields: fields
        };
    },
    computed: {
        ...mapState([
            'scholarshipSearchResults'
        ])
    },
    methods: {
        redirectToScholarshipDetail: function (scholarshipId) {
            window.open('/scholarship/' + scholarshipId, '_blank');
        }
    }
}
</script>

<style>

</style>
