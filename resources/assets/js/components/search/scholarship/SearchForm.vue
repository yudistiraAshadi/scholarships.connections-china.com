<template>

    <form class="form-horizontal">

        <div class="form-group">
            <label for="scholarshipType" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input
                        type="radio"
                        id="scholarshipType"
                        value=""
                        v-model="scholarshipType"
                        checked="checked"
                        @keyup.enter.prevent="search"> All
                </label>
                <label
                    class="radio-inline"
                    v-for="scholarshipTypeOption in searchOptions.scholarship_types">
                    <input
                        type="radio"
                        id="scholarshipType"
                        :value="scholarshipTypeOption"
                        v-model="scholarshipType"
                        @keyup.enter.prevent="search">
                         {{ scholarshipTypeOption | capitalize }} Scholarship
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="universityName" class="col-sm-2 control-label">University</label>
            <div class="col-sm-10">
                <select id="universityName" class="form-control" v-model="universityName">
                    <option value="">All</option>
                    <option 
                        v-for="universityNameOption in searchOptions.university_names"
                        :value="universityNameOption">
                        {{ universityNameOption }}    
                    </option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="degreeType" class="col-sm-2 control-label">Degree</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input
                        type="radio"
                        id="degreeType"
                        value=""
                        v-model="degreeType"
                        checked="checked"
                        @keyup.enter.prevent="search"> All
                </label>
                <label
                    class="radio-inline"
                    v-for="degreeTypeOption in searchOptions.degree_types">
                    <input 
                        type="radio" 
                        id="degreeType"
                        :value="degreeTypeOption" 
                        v-model="degreeType"
                        @keyup.enter.prevent="search">
                         {{ degreeTypeOption | capitalize }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="programLanguage" class="col-sm-2 control-label">Language</label>
            <div class="col-sm-10">
                <label class="radio-inline">
                    <input
                        type="radio"
                        id="programLanguage"
                        value=""
                        v-model="programLanguage"
                        checked="checked"
                        @keyup.enter.prevent="search"> All
                </label>
                <label
                    class="radio-inline"
                    v-for="programLanguageOption in searchOptions.program_languages">
                    <input
                        type="radio" 
                        id="programLanguage"
                        :value="programLanguageOption" 
                        v-model="programLanguage"
                        @keyup.enter.prevent="search">
                         {{ programLanguageOption | capitalize }}
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="program" class="col-sm-2 control-label">Program</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="program"
                    v-model="program" @keyup.enter.prevent="search">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" @click.prevent="search">
                    Search
                </button>
            </div>
        </div>
        
    </form>

</template>

<script>

import { mapActions } from 'vuex';

export default {
    data: function () {
        return {
            // Data for options showing.
            searchOptions: [],

            // Data as value that we will send as a search query
            scholarshipType: '',
            universityName: '',
            degreeType: '',
            programLanguage: '',
            program: '',
        }
    },
    methods: {
        ...mapActions([
            'scholarshipSearchResultsChanged'
        ]),
        search: function () {
            axios.post('/api/search/advanced/scholarship', {
                    scholarship_type: this.scholarshipType,
                    university_name: this.universityName,
                    degree_type: this.degreeType,
                    program_language: this.programLanguage,
                    program: this.program
                })
                .then((res) => {
                    this.scholarshipSearchResultsChanged(res.data);
                })
                .catch((err) => {
                    console.log(err.response);
                });
        }
    },
    beforeCreate: function () {
        // Get all data for search options
        axios.get('/api/search/advanced/scholarship/search-options')
            .then((res) => {
                this.searchOptions = res.data;
            })
            .catch((err) => {
                console.log(err.response);
            });
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

<style scoped>

</style>
