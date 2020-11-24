<div class="show-search">
                                                    <ul>
                                                    @foreach ($data as $items)                                                   
                                                        <li>
                                                            <img src="{{asset('public/upload/'.$items->AnhChinh)}}" width="60px" height="80px">
                                                            <p>{{$items->Name}}</p>
                                                            <a href="{{asset('admin/nhapkho/add/'.$items->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Thêm</button></a>
                                                            <div style="clear: both;"></div>
                                                        </li> 
                                                    @endforeach                                                                                         
                                                    </ul>
                                                </div>