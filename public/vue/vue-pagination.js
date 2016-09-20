// <pagination @change-page="changePage" :pagination.sync="pagination" :offset.sync="offset" :page-size.sync="pageSize" :name.sync="name"></pagination>
(function (Vue) {
    var tm = '<div class=\"dataTables_info\" id=\"data-table_info\" role=\"status\" aria-live=\"polite\">'
        +'显示 第{{pagination.current_page}}页，一页显示{{pageSize}}条，总数{{pagination.total}}条</div>'
        +'<div class=\"dataTables_paginate paging_simple_numbers\" id=\"data-table_paginate\">'
        +'<a class=\"paginate_button previous\" aria-controls=\"data-table\" data-dt-idx=\"0\" tabindex=\"0\" id=\"data-table_previous\" @click.prevent=\"changePage(pagination.current_page - 1,pageSize,name)\">上一页</a>'
        +'<span v-for=\"page in pagesNumber\">'
        +'<a class=\"paginate_button\" aria-controls=\"data-table\" data-dt-idx=\"1\" tabindex=\"0\" @click=\"changePage(page,pageSize,name)\">{{page}}</a>'
        +'</span>'
        +'<a class=\"paginate_button next\" aria-controls=\"data-table\" data-dt-idx=\"7\" tabindex=\"0\" id=\"data-table_next\" @click.prevent=\"changePage(pagination.current_page + 1,pageSize,name)\">下一页</a>'
        +'</div>'
        +'</div>';
    Vue.component('pagination', {
        props: ['pagination','offset','pageSize','name'],
        template: tm,
        replace: true,
        inherit: false,
        created: function(){
            console.log(this.pageSize)
        },
        computed: {
            noPrevious: function () {
                return this.pagination.current_page === 1;
            },
            /**
             *  [pagesNumber 页数]
             */
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods: {
            changePage: function (page,pageSize,name) {
                this.$dispatch('change-page',page,pageSize,name)
            },
        },
    })
})(Vue)