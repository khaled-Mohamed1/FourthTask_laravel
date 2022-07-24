            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">رقم البطاقة</th>
                        <th scope="col">رقم الهوية</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">المحافظة </th>
                        <th scope="col">المنطقة</th>
                        <th scope="col">عمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farmers as $key => $farmer)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $farmer->card_id }}</td>
                            <td>{{ $farmer->id_NO }}</td>
                            <td>{{ $farmer->firstname }} {{ $farmer->secondname }} {{ $farmer->thirdname }}
                                {{ $farmer->fourthname }}</td>
                            <td>{{ $farmer->city }}</td>
                            <td>{{ $farmer->region }}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editModal"
                                    class="btn btn-primary edit_farmer" data-id="{{ $farmer->id }}"
                                    data-card_id="{{ $farmer->card_id }}"
                                    data-entry_date="{{ $farmer->entry_date }}"
                                    data-idnumber="{{ $farmer->id_NO }}"
                                    data-date_of_birth="{{ $farmer->date_of_birth }}"
                                    data-firstname="{{ $farmer->firstname }}"
                                    data-secondname="{{ $farmer->secondname }}"
                                    data-thirdname="{{ $farmer->thirdname }}"
                                    data-fourthname="{{ $farmer->fourthname }}"
                                    data-phone="{{ $farmer->phone_NO }}" data-email="{{ $farmer->email }}"
                                    data-gender="{{ $farmer->gender }}" data-city="{{ $farmer->city }}"
                                    data-region="{{ $farmer->region }}"
                                    data-nearest_place="{{ $farmer->nearest_place }}"
                                    data-status="{{ $farmer->status }}"
                                    data-qualification="{{ $farmer->qualification }}"><i class="las la-edit"></i></a>
                                <a href="" data-id="{{ $farmer->id }}" class="btn btn-danger delete_farmer"><i
                                        class="las la-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $farmers->links() !!}
