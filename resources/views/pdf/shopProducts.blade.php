<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
            table {
                border: tomato;
                width: 100%;
            }

            th, td {
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #b6b5b5;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                    <h1 style="color: #ff8914;">N1</h1>
								</td>

								<td>
									Invoice #: 123<br />
									Title: {{ $title }}<br />
									Created: {{ $date }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المنتج</th>
                            <th>الحالة</th>
                            <th>السعر</th>
                            <th>الكمية المباعة</th>
                            <th>الكمية المتبقية</th>
                            <th>القسم</th>
                            <th>تقييم المنتج</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->random_id }}</td>
                            <td>{{ $product->product_name}}</td>
                            @if ($product->status == 'متوفر')
                                <td class="text-success mx-5">{{ $product->status }}</td>
                            @else
                                <td class="text-danger mx-5">{{ $product->status }}</td>
                            @endif
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->sold_quantity }}</td>
                            <td>{{ $product->remaining_quantity }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td><i class="fa fa-thin fa-star text-warning"></i> 4.5</td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-danger" colspan="10">
                                لا يوجد بيانات
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
			</table>
		</div>
	</body>
</html>
