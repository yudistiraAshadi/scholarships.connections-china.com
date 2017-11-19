<template>
<div class="container-fluid">
    <div class="row my-1">
        <div class="col-md-3">
            <div class="p">
                Total results: <strong>{{ totalResults }}</strong>
            </div>
        </div>
        <div class="col-md-3 offset-md-6">
            <b-form-group horizontal label="Results per page" :label-cols="6">
                <b-form-select :options="pageOptions" v-model="perPage" />
            </b-form-group>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <b-table
                hover
                :current-page="currentPage"
                :per-page="perPage"
                :items="scholarshipSearchResults"
                :fields="fields"
                v-on:row-clicked="redirectToScholarshipDetail">

                <template slot="university" slot-scope="row">
                    <img :src="row.value.logo" style="width: 4rem; height: 4rem;">
                    &nbsp;&nbsp;&nbsp;{{ row.value.name }}
                </template>

            </b-table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <b-pagination align="center" :total-rows="totalResults" :per-page="perPage" v-model="currentPage" />
        </div>
    </div>
</div>
</template>

<script>

import { mapState } from 'vuex';
import bTable from 'bootstrap-vue/es/components/table/table';
import bFormGroup from 'bootstrap-vue/es/components/form-group/form-group';
import bFormSelect from 'bootstrap-vue/es/components/form-select/form-select';
import bPagination from 'bootstrap-vue/es/components/pagination/pagination';

export default {
    components: {
        'b-table': bTable,
        'b-form-group': bFormGroup,
        'b-form-select': bFormSelect,
        'b-pagination': bPagination
    },
    props: {
        sortable: {
            type: Boolean,
            default: true
        },
        perPage: {
            type: Number,
            default: 10
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

        let pageOptions = [
            { text: 5, value: 5 },
            { text: 10, value: 10 },
            { text: 15, value: 15 },
            { text: 30, value: 30 }
        ];

        return {
            fields: fields,
            currentPage: 1,
            pageOptions: pageOptions
        };
    },
    computed: {
        ...mapState([
            'scholarshipSearchResults'
        ]),
        totalResults: function () {
            return this.scholarshipSearchResults.length;
        }
    },
    methods: {
        redirectToScholarshipDetail: function (scholarship) {
            window.open('/scholarship/' + scholarship.id, '_blank');
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
