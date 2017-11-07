<template>
    <table class="table table-hover">
       <thead>
            <tr>
                <th>University</th>
                <th>Courses</th>
                <th>Application Deadline</th>
            </tr>
       </thead>
       <tbody>
            <scholarship-search-result-item
                v-for="scholarship in this.scholarshipSearchResults"
                :key="scholarship.id"
                :scholarship="scholarship" />
       </tbody>
    </table>
</template>

<script>

import { mapState } from 'vuex';

export default {
    computed: {
        ...mapState([
            'scholarshipSearchResults'
        ])
    }
}
</script>

<style>

</style>
