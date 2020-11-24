<div class="live-search">
                    <ul>
                    @foreach ($data as $items)                    
                      <li>
                        <img src="{{asset('public/upload/'.$items->AnhChinh)}}" width="60px" height="80px">
                        <a href="{{asset('products-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}"><p>{{$items->Name}}</p></a>
                        <div style="clear: both;"></div>
                      </li>
                    @endforeach
                    </ul>
                  </div>