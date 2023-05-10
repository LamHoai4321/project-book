@foreach($binhluans as $preview)
                        <div class="media mb-3">
                            <div class="mr-2">
                                <small class="text-muted">{{$preview->IdKH}}</small>
                            </div>
                            <div class="media-body">
                                <p>{{$preview->NoiDung}}</p>
                                <small class="text-muted">{{$preview->Ngay}}</small>
                            </div>
                        </div>
                        <hr>
            @endforeach