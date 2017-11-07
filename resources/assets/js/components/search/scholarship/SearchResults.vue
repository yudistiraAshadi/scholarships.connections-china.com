<template>
    <table class="table table-hover">
       <thead>
            <tr>
                <th>University</th>
                <th>Program</th>
                <th>Language</th>
                <th>Scolarship Category</th>
                <th>Degree</th>
            </tr>
       </thead>
       <tbody>
            <scholarship-search-result-item
                v-for="scholarship in this.scholarshipSearchResults"
                :key="scholarship.id"
                v-bind:scholarship="scholarship" />
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
