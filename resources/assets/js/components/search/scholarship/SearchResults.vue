<template>
<div class="container-fluid">

    <!-- Top Row - Total results and Results per page -->
    <template v-if="showResultsPerPage">
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
    </template><!-- End of top row -->

    <!-- Table of results -->
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
                    &nbsp;&nbsp;&nbsp;{{ row.value.name | capitalize }}
                </template>
                <template slot="degree_type" slot-scope="row">
                    {{ row.value.type | capitalize }}
                </template>
                <template slot="program" slot-scope="row">
                    {{ row.value | capitalize }}
                </template>
                <template slot="program_language" slot-scope="row">
                    {{ row.value.language | capitalize }}
                </template>
                <template slot="scholarship_type" slot-scope="row">
                    {{ row.value.type | capitalize }} Scholarship
                </template>


            </b-table>
        </div>
    </div><!-- End of table of results -->

    <!-- Bottom Row - Pagination navbar -->
    <template v-if="showPaginationNavbar">
        <div class="row">
            <div class="col-md-12">
                <b-pagination align="center" :total-rows="totalResults" :per-page="perPage" v-model="currentPage" />
            </div>
        </div>
    </template><!-- End of pagination navbar -->
    
</div>
</template>

<script>

import { mapState } from 'vuex';

export default {
    props: {
        showResultsPerPage: {
            type: Boolean,
            default: true
        },
        showPaginationNavbar: {
            type: Boolean,
            default: true
        },
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
                key: 'degree_type',
                label: 'Degree',
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
                key: 'program_language',
                label: 'Language',
                sortable: this.sortable,
                'class': 'text-center align-middle'
            },
            {
                key: 'scholarship_type',
                label: 'Scholarship Category',
                sortable: this.sortable,
                'class': 'text-center align-middle'
            },
            {
                key: 'application_deadline',
                label: 'Application Deadline',
                sortable: this.sortable,
                'class': 'text-center align-middle'
            }
        ];

        let pageOptions = [
            { text: 5, value: 5 },
            { text: 10, value: 10 },
            { text: 15, value: 15 },
            { text: 30, value: 30 }
        ];

        let dataPerPage = this.perPage;

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
    },
    filters: {
        capitalize: function (value) {
            if (!value) {
                return '';
            }
            value = value.toString();
            return value.charAt(0).toUpperCase() + value.slice(1);
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
