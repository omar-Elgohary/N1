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

            .section-title{
                color: #ff8914
            }

            .status{
                color: green
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
                                    Event Purchese Details
								</td>
							</tr>
						</table>
					</td>
				</tr>
            </table>

            <section>
                <div class="container" dir="rtl">
                    <div class="col-12 d-flex p-0">
                        <div class="col-6 section-title text-end p-0">
                            <h2 class="text-black">{{ __('events.reservation_process_details') }}</h2>
                        </div>

                        <div class="col-6 text-start">
                        </div>
                    </div> <!-- col-12 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            @if($order->order_status == 'حجز مؤكد')
                                <h4 class="status">{{ __('events.confirmed_reservation') }}</h4>
                            @elseif($order->order_status == 'لم يتم تأكيد الحضور')
                                <h4 class="status">{{ __('events.attendance_not_confirmed') }}</h4>
                            @else
                                <h4 class="status">{{ __('events.attendance_confirmed') }}</h4>
                            @endif
                        </div> <!-- 1 -->

                        <div class="form-group">
                            <label style="margin-left: 70px">{{ __('restaurent.user_phone') }}: </label>
                            <strong>{{ $order->user->phone }}</strong>
                        </div> <!-- 2 -->

                        <div class="form-group my-4">
                            <label>{{ __('restaurent.user_name') }}: </label>
                            <strong class="mx-5">{{ $order->user->name }}</strong>
                        </div> <!-- 3 -->

                        <div class="form-group my-4">
                            <label style="margin-left: 20px">{{ __('events.tickets_number') }}: </label>
                            <strong class="mx-5">{{ $order->tickets_count }} {{ __('events.ticket') }}</strong>
                        </div> <!-- 4 -->

                        <div class="form-group my-4">
                            <label>{{ __('events.reservation_date') }}: </label>
                            <strong class="mx-5">{{ $order->event->reservation_date }}</strong>
                        </div> <!-- 5 -->

                        <div class="form-group my-4">
                            <label>{{ __('restaurent.total_price') }}: </label>
                            <strong class="mx-5">({{ $order->total_price }}) {{ __('restaurent.SAR') }}</strong>
                        </div> <!-- 6 -->

                    </div> <!-- col-4 -->
                </div> <!-- container -->
            </section>
		</div>
	</body>
</html>
