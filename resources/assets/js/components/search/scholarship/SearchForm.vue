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
                    v-for="scholarshipTypeOption in scholarshipTypeLists"
                    v-bind:key="scholarshipTypeOption.id">
                    <input
                        type="radio"
                        id="scholarshipType"
                        :value="scholarshipTypeOption.type"
                        v-model="scholarshipType"
                        @keyup.enter.prevent="search"> {{ scholarshipTypeOption.type }} Scholarship
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="universityName" class="col-sm-2 control-label">University</label>
            <div class="col-sm-10">
                <select id="universityName" class="form-control" v-model="universityName">
                    <option value="">All</option>
                    <option 
                        v-for="universityNameOption in universityLists"
                        v-bind:key="universityNameOption.id"
                        :value="universityNameOption.name">
                        {{ universityNameOption.name }}    
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
                    v-for="degreeTypeOption in degreeTypeLists"
                    v-bind:key="degreeTypeOption.id">
                    <input 
                        type="radio" 
                        id="degreeType"
                        :value="degreeTypeOption.type" 
                        v-model="degreeType"
                        @keyup.enter.prevent="search"> {{ degreeTypeOption.type }}
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
                    v-for="programLanguageOption in programLanguageLists"
                    v-bind:key="programLanguageOption.id">
                    <input
                        type="radio" 
                        id="programLanguage"
                        :value="programLanguageOption.language" 
                        v-model="programLanguage"
                        @keyup.enter.prevent="search"> {{ programLanguageOption.language }}
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
    data () {
        return {
            // Data for options showing.
            scholarshipTypeLists: [],
            universityLists: [],
            degreeTypeLists: [],
            programLanguageLists: [],

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
        search () {
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
    beforeCreate () {
        // Get all data for search options
        axios.all([
                axios.get('/api/model/statics/scholarship-type'),
                axios.get('/api/model/university'),
                axios.get('/api/model/statics/degree-type'),
                axios.get('/api/model/statics/program-language')
            ])
            .then(axios.spread((scholarshipTypeRes, 
                            universityRes,
                            degreeTypeRes,
                            programLanguageRes) => {
                this.scholarshipTypeLists = scholarshipTypeRes.data;
                this.universityLists = universityRes.data;
                this.degreeTypeLists = degreeTypeRes.data;
                this.programLanguageLists = programLanguageRes.data;
            }))
            .catch((err) => {
                console.log(err.response);
            })
    }
}
</script>

<style scoped>

</style>
