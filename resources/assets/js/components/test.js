// register the grid component
Vue.component('detail-grid', {
	template: '#detail-template',
	props: {
  	detail: Object
  },
  data() {
    return { additionalInfo: {} }
  },
  created() { this.updateDetail() },
  watch: {
    detail: 'updateDetail'
  },
  methods: {
    updateDetail() {
      this.additionalInfo = {} // reset local state
      console.log('use AJAX here to get additional details and save it in the local data')
    }
  }
})

Vue.component('demo-grid', {
  template: '#grid-template',
  props: {
    data: Array,
    columns: Array,
    filterKey: String
  },
  data: function () {
    var sortOrders = {}
    this.columns.forEach(function (key) {
      sortOrders[key] = 1
    })
    return {
      sortKey: '',
      sortOrders: sortOrders
    }
  },
  computed: {
    filteredData: function () {
      var sortKey = this.sortKey
      var filterKey = this.filterKey && this.filterKey.toLowerCase()
      var order = this.sortOrders[sortKey] || 1
      var data = this.data
      if (filterKey) {
        data = data.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return String(row[key]).toLowerCase().indexOf(filterKey) > -1
          })
        })
      }
      if (sortKey) {
        data = data.slice().sort(function (a, b) {
          a = a[sortKey]
          b = b[sortKey]
          return (a === b ? 0 : a > b ? 1 : -1) * order
        })
      }
      return datadata
    }
  },
  filters: {
    capitalize: function (str) {
      return str.charAt(0).toUpperCase() + str.slice(1)
    }
  },
  methods: {
    sortBy: function (key) {
      this.sortKey = key
      this.sortOrders[key] = this.sortOrders[key] * -1
    },
    edit: function (entry) {
      // alert(entry.email)  ;
      this.$emit('selected', entry)
    }
  }
})

// bootstrap the demo
var demo = new Vue({
  el: '#demo',
  data: {
    entry: null,
      Query: '',
    gridColumns: ['name', 'power'],
    gridData: [
      { name: 'Chuck Norris', power: Infinity, email:'ch@xxx.com' },
      { name: 'Bruce Lee', power: 9000, email:'Lee@.yyy.com' },
      { name: 'Jackie Chan', power: 7000,email:'Chan@.zzz.com' },
      { name: 'Jet Li', power: 8000,email:'Jet@.zyy.com' }
    ]
  },
  methods: {
    setEntry(entry) {
      this.entry = entry
    }
  }
})
