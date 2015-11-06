<div class="lend-table">
    <div class="panel panel-default">
        <div class="panel-heading">Books lent
        @if (count($books) > 0)
            <span class="badge pull-right">
            <b>{{ count($books) }}/7</b></span>
        @endif
        </div>

        @if (count($books)==0)
        <div class="panel-body text-center">
            None
        </div>
        @else
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Book</th>
                    <th>Type</th>
                    <th>Author</th>
                    <th>Edition</th>
                    <th>Issue Date</th>
                    <th>Expiry Date</th>
                    <th>Fine</th>
                </tr>
            </thead>
            <tbody>
                <!-- tr class="info | success | danger | warning | active" -->
                @foreach ($books as $book)
                      <?php
                        $assigned = strtotime( $book->assigned_date );
                        $expired = strtotime( $book->assigned_date . " + {$book->book->booktype->expiry} days");

                        $today = strtotime( date("Y-m-d H:i:s"));

                        // Converting to day
                        $days = floor(($today - $expired)/(60*60*24));
                        $fine = $days>0 ? $days : 0;
                      ?>
                <tr @if ($fine) class="warning" @endif >
                    <td>{{$book->id}}</td>
                    <td>
                        <a href="{{ URL::to('book/'.$book->book->isbn) }}">
                        {{$book->book->name}}
                        </a>
                    </td>
                    <td>{{$book->book->booktype->name}}</td>
                    <td>{{$book->book->author}}</td>
                    <td>{{$book->edition}}</td>
                    <td>{{ date("Y.m.d",$assigned) }}</td>
                    <td> {{ date("Y.m.d",$expired) }}</td>
                    <td> {{ $fine }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
