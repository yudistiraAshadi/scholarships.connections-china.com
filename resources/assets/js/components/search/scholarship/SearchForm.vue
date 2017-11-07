<template>
    <div>

        <div class="form-group">
            <label for="universityName">University Name</label>
            <input type="text" class="form-control" id="universityName"
                v-model="universityName">
        </div>
        <div class="form-group">
            <label for="studentType">Student Type</label>
            <select id="studentType" class="form-control" v-model="studentType">
                <option value="" disabled>Select type</option>
                <option value="">All type</option>
                <option value="undergraduate">Undergraduate</option>
                <option value="graduate">Graduate</option>
            </select>
        </div>
        <div class="form-group">
            <label for="scholarshipType">Scholarship Type</label>
            <select id="scholarshipType" class="form-control" v-model="scholarshipType">
                <option value="" disabled>Select type</option>
                <option value="" selected="selected">All type</option>
                <option value="full">Full scholarship</option>
                <option value="partial">Partial scholarship</option>
            </select>
        </div>
        <div class="form-group">
            <label for="courses">Courses</label>
            <input type="text" class="form-control" id="courses"
                v-model="courses">
        </div>
        <button class="btn btn-default" v-on:click="search">
            Search
        </button>

    </div>
</template>

<script>

import { mapActions } from 'vuex';

export default {
    data () {
        return {
            universityName: '',
            studentType: '',
            scholarshipType: '',
            courses: ''
        }
    },
    methods: {
        ...mapActions([
            'scholarshipSearchResultsChanged'
        ]),
        search () {
            axios.post('/api/search/advanced/scholarship', {
                    university_name: this.universityName,
                    student_type: this.studentType,
                    scholarship_type: this.scholarshipType,
                    courses: this.courses
                })
                .then((res) => {
                    this.scholarshipSearchResultsChanged(res.data);
                })
                .catch((err) => {
                    console.log(err.response);
                });
        }
    }
}
</script>

<style scoped>

</style>
