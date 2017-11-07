<template>
    <tr>
        <td>{{ scholarship.university.name }}</td>
        <td>{{ scholarship.program }}</td>
        <td>{{ scholarship.program_language.language }}</td> 
        <td>{{ scholarship.scholarship_type.type }}</td>
        <td>{{ scholarship.degree_type.type }}</td>
    </tr>
</template>

<script>
export default {
    props: [
        'scholarship'
    ]
}
</script>

<style>

</style>
