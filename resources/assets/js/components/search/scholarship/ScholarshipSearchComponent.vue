<template>
    <div>

        <!-- search/scholarship/SearchFormComponent -->
        <search-scholarship-form
            v-on:scholarship-search-submitted="searchScholarship" />

        <!-- search/scholarship/SearchResultComponent -->
        <search-scholarship-result></search-scholarship-result>
    
        <slot></slot>
    </div>
</template>

<script>
export default {
    data () {

    },
    methods: {
        searchScholarship (data) {
            axios.post('/api/search/advanced/scholarship', {
                    university_name: data.universityName,
                    student_type: data.studentType,
                    scholarship_type: data.scholarshipType,
                    courses: data.courses
                })
                .then((res) =>{

                })
        }
    }
}
</script>

<style>

</style>
