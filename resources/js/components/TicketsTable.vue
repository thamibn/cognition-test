<template>
  <el-table :data="data" style="width: 100%" @sort-change="handleUpdate()">
    <el-table-column type="expand">
      <template slot-scope="props">
        <p>Customer Email: {{ props.row.complainant_email }}</p>
        <p>Customer Cell: {{ props.row.complainant_tel }}</p>
        <p>Agent Name: {{ props.row.user.name }} {{ props.row.user.surname }}</p>
        <p>Type: {{ props.row.category.name }}</p>
        <p>Update Date: {{ props.row.updated_at }}</p>
        <p>Location: {{ props.row.captured_location.cityName }}</p>
      </template>
    </el-table-column>
    <el-table-column sortable="custom" prop="ticket_number" label="Ticket NO"></el-table-column>
    <el-table-column sortable="custom" prop="complainant_fullname" label="Fullname"></el-table-column>
    <el-table-column prop="status" label="Status"></el-table-column>
    <el-table-column prop="created_at" label="Created"></el-table-column>
    <el-table-column fixed="right" label="Operations">
      <template slot-scope="scope">
        <el-button @click="handleUpdate" type="warning" size="small">Processing</el-button>
        <el-button type="success" size="small">Done</el-button>
      </template>
    </el-table-column>
  </el-table>
</template>

<script>
export default {
  name: "TicketsTable",
  props: {
    data: {
      type: Array,
      default: []
    }
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    handleUpdate() {
      console.log(this.data);
    }
  }
};
</script>

<style scoped>
.el-dropdown {
  vertical-align: top;
}
.el-dropdown + .el-dropdown {
  margin-left: 15px;
}
.el-icon-arrow-down {
  font-size: 12px;
}
</style>
