<template>
<div>
  <!-- <el-input v-model="query.keyword" placeholder="search.." style="width: 200px;" class="filter-item" @keyup.enter.native="handleFilter" /> -->
  <el-table :data="data" style="width: 100%" >
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
    <el-table-column sortable prop="ticket_number" label="Ticket NO"></el-table-column>
    <el-table-column sortable prop="complainant_fullname" label="Fullname"></el-table-column>
    <el-table-column sortable prop="status" label="Status"></el-table-column>
    <el-table-column prop="created_at" label="Created"></el-table-column>
    <el-table-column fixed="right" label="Operations">
      <template slot-scope="scope">
        <el-button @click="handleUpdate(scope.row.id, 'In progress')" v-if="scope.row.status.toLowerCase() === 'newly logged'" type="warning" size="small">In progress</el-button>
        <el-button @click="handleUpdate(scope.row.id,'Resolved')" v-if="scope.row.status.toLowerCase() !== 'resolved'" type="success" size="small">Resolved</el-button>
      </template>
    </el-table-column>
  </el-table>

  <pagination v-show="total>0" :total="total" :page.sync="query.page" :limit.sync="query.limit" @pagination="getData" />
    </div>
</template>

<script>
import Pagination from './Pagination';
import axios from 'axios';
export default {
  name: "TicketsTable",
  components: { Pagination },
  props: {
    data: {
      type: Array,
      default: []
    },
    url: {
      type: String,
      default: 'http://localhost'
    }
  },
  data() {
    return {
      total: 0,
      query: {
        page: 1,
        limit: 10,
        keyword: '',
        role: '',
      },
    };
  },
  methods: {
    //it was inteded for getting filtered data from server
    getData(){
      axios.get(this.url,{
        params: this.query
      }).then(res => {
        window.location = this.url;
      }).catch(error => {

      })
    },

    //it was supposed to filter the table and get filtered data
    handleFilter() {
      this.query.page = 1;
      this.getData();
    },

    //update the status and return updated data.
    handleUpdate(id,status) {
      axios.post(this.url+'/update/status/'+id, {status: status}).then(res => {
        window.location = this.url;
      }).catch(error => {

      })
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
