<template>
    <section class="content-header">
        <h1>
            <a style="color: #000; " href="{{url('admin')}}"> Trang chủ</a>
            <small> Danh sách bài viết</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Danh sách bài viết</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->
                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Danh sách bài viết</h3>
                    </div>
                    <div class="box-header">
                        <form method="get">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="search"  type="text" class="form-control" placeholder="Nhập tên sản phẩm">

                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-success" type="submit">Tìm kiếm</button>
                                        <a href="{{route('inventory')}}" class="btn btn-default" type="submit">Xóa tìm kiếm</a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        <div class="alert alert-success alert-dismissible" id="alert-success" style="display: none">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Alert!</h4>
                            <div class="content-message"></div>
                        </div>
                    </div>
                    <div id="UserController" class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead>
                            <th>ID</th>
                            <th>title</th>
                            <th>Content</th>
                            </thead>
                            <tbody>

                            <tr v-for='users in users'>
                                <td>@{{ users.id }}</td>
                                <td>@{{ users.title }}</td>
                                <td>@{{ users.content }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted(){
            var app = this;
            axios.get('api/user').then(response=>{
                app.users = response.data;
            })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
        },
    }
</script>

<style scoped>

</style>