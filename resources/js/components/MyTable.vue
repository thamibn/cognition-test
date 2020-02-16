<template>
    <el-table
      :data="data"
      style="width: 100%">
      <el-table-column
        prop="name"
        label="Name">
      </el-table-column>
      <el-table-column
        prop="surname"
        label="Last Name">
      </el-table-column>
      <el-table-column
        prop="email"
        label="Email">
      </el-table-column>
    </el-table>
</template>

<script>
    export default {
        name: 'MyTable',
        props:{
            data: Object,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
