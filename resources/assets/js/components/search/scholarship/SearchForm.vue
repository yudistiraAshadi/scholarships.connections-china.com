<template>

    <form :class="classNames['search-form']">
        <!-- Scholarship Type Radio-->
        <div :class="classNames['search-form__scholarship-type']">
            <label
                for="scholarshipType"
                :class="classNames['search-form__scholarship-type__label']">
                <strong>Category</strong>
            </label>

            <div :class="classNames['search-form__scholarship-type__input-wrapper']">
                <label class="custom-control custom-radio">
                    <input
                        class="custom-control-input"
                        type="radio"
                        id="scholarshipType"
                        value=""
                        v-model="scholarshipType"
                        checked="checked"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">&nbsp;All</span>
                </label>

                <label
                    class="custom-control custom-radio"
                    v-for="scholarshipTypeOption in searchOptions.scholarship_types">
                    <input
                        class="custom-control-input"
                        type="radio"
                        id="scholarshipType"
                        :value="scholarshipTypeOption.id"
                        v-model="scholarshipType"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">
                            &nbsp;{{ scholarshipTypeOption.type | capitalize }} Scholarship
                        </span>
                </label>
            </div>
        </div><!-- End of Scholarship Type Radio-->


        <!-- University Name Select -->
        <div :class="classNames['search-form__university-name']">
            <label for="university" :class="classNames['search-form__university-name__label']"><strong>University</strong></label>
            <div :class="classNames['search-form__university-name__input-wrapper']">
                <select id="university" class="custom-select" v-model="university">
                <option value="" selected>All</option>
                <option 
                    v-for="universityOption in searchOptions.universities"
                    :value="universityOption.id">
                    {{ universityOption.name }}    
                </option>
            </select>
            </div>
        </div><!-- End of University Name Select -->


        <!-- Degree Type Radio -->
        <div :class="classNames['search-form__degree-type']">
            <label for="degreeType" :class="classNames['search-form__degree-type__label']"><strong>Degree</strong></label>

            <div :class="classNames['search-form__degree-type__input-wrapper']">
                <label class="custom-control custom-radio">
                    <input
                        class="custom-control-input"
                        type="radio"
                        id="degreeType"
                        value=""
                        v-model="degreeType"
                        checked="checked"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">&nbsp;All</span>
                </label>

                <label
                    class="custom-control custom-radio"
                    v-for="degreeTypeOption in searchOptions.degree_types">
                    <input 
                        class="custom-control-input"
                        type="radio" 
                        id="degreeType"
                        :value="degreeTypeOption.id" 
                        v-model="degreeType"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">
                            &nbsp;{{ degreeTypeOption.type | capitalize }}
                        </span>
                </label>
            </div>
        </div><!-- End of Degree Type Radio -->


        <!-- Program Language Radio -->
        <div :class="classNames['search-form__program-language']">
            <label
                for="programLanguage"
                :class="classNames['search-form__program-language__label']">
                <strong>Language</strong>
            </label>
            <div :class="classNames['search-form__program-language__input-wrapper']">
                <label class="custom-control custom-radio">
                    <input
                        class="custom-control-input"
                        type="radio"
                        id="programLanguage"
                        value=""
                        v-model="programLanguage"
                        checked="checked"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">&nbsp;All</span>
                </label>
                <label
                    class="custom-control custom-radio"
                    v-for="programLanguageOption in searchOptions.program_languages">
                    <input
                        class="custom-control-input"
                        type="radio" 
                        id="programLanguage"
                        :value="programLanguageOption.id" 
                        v-model="programLanguage"
                        @keyup.enter.prevent="search">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">
                            &nbsp;{{ programLanguageOption.language | capitalize }}
                        </span>
                </label>
            </div>
        </div><!-- End of Program Language Radio -->


        <!-- Program Input -->
        <div :class="classNames['search-form__program']">
            <label for="program" :class="classNames['search-form__program__label']"><strong>Program</strong></label>
            <div :class="classNames['search-form__program__input-wrapper']">
                <input type="text" id="program" class="form-control"
                    v-model="program" @keyup.enter.prevent="search">
            </div>
        </div><!-- End of Program Input -->


        <!-- Submit Button -->
        <div :class="classNames['search-form__submit-btn']">
            <div :class="classNames['search-form__submit-btn__btn-wrapper']">
                <button :class="classNames['search-form__submit-btn__btn']" @click.prevent="search">
                    <strong>Search</strong>
                </button>
            </div>
        </div><!-- End of Submit Button -->
    </form>

</template>

<script>

import { mapActions } from 'vuex';

export default {
    props: {
        firstQuery: {
            type: Object,
            default: function () {
                return {
                    scholarshipType: '',
                    university: '',
                    degreeType: '',
                    programLanguage: '',
                    program: ''
                }
            }
        },
        classNames: {
            type: Object,
            default: function () {
                return {
                    'search-form': '',

                    // Scholarship Type
                    'search-form__scholarship-type': '',
                    'search-form__scholarship-type__label': '',
                    'search-form__scholarship-type__input-wrapper': '',

                    // University Name
                    'search-form__university-name': '',
                    'search-form__university-name__label': '',
                    'search-form__university-name__input-wrapper': '',

                    // Degree Type
                    'search-form__degree-type': '',
                    'search-form__degree-type__label': '',
                    'search-form__degree-type__input-wrapper': '',

                    // Program Language
                    'search-form__program-language': '',
                    'search-form__program-language__label': '',
                    'search-form__program-language__input-wrapper': '',

                    // Program
                    'search-form__program': '',
                    'search-form__program__label': '',
                    'search-form__program__input-wrapper': '',

                    // Submit Button
                    'search-form__submit-btn': '',
                    'search-form__submit-btn__btn-wrapper': '',
                    'search-form__submit-btn__btn': '',
                };
            }
        }
    },
    data: function () {
        return {
            // Data for options showing.
            searchOptions: [],

            // Data as value that we will send as a search query
            scholarshipType: this.firstQuery.scholarshipType,
            university: this.firstQuery.university,
            degreeType: this.firstQuery.degreeType,
            programLanguage: this.firstQuery.programLanguage,
            program: this.firstQuery.program,
        }
    },
    methods: {
        ...mapActions([
            'scholarshipSearchResultsChanged'
        ]),
        search: function () {
            axios.post('/api/search/advanced/scholarship', {
                    scholarship_type: this.scholarshipType,
                    university: this.university,
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
    mounted: function () {
        this.search();
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
