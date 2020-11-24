                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Basic Table</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">           
                              <tbody>
                                <tr>
                                  <th>id</th>
                                  <th>Tên Danh Mục</th>
                                </tr>
                              @foreach ($data as $items)
                                <tr>
                                  <td>{{$items->id}}</td>
                                  <td>{{$items->Name}}</td>
                                </tr>
                              @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                    {!!$data->links()!!}