<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Order Details' }}</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0"
        style="background-color:#f4f6f8; padding:30px 10px;">

        <tr>
            <td align="center">

                {{-- Main Container --}}
                <table width="700" cellpadding="0" cellspacing="0" border="0"
                    style="max-width:700px; width:100%; background-color:#ffffff; border-radius:8px; overflow:hidden;">

                    {{-- Header --}}
                    <tr>
                        <td style="background-color:#0d6efd; padding:20px 25px;">

                            <h2 style="margin:0; color:#ffffff; font-size:22px;">
                                Storing Billing
                            </h2>

                            <p style="margin:6px 0 0; color:#eaf2ff; font-size:14px;">
                                Order Details
                            </p>

                        </td>
                    </tr>


                    {{-- Customer Details --}}
                    <tr>
                        <td style="padding:25px;">

                            <h3 style="margin:0 0 15px; color:#333333; font-size:18px;">
                                Customer Details
                            </h3>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0">

                                <tr>
                                    <td width="50%"
                                        style="padding:8px 0; color:#777777; font-size:13px;">
                                        Customer Name
                                    </td>

                                    <td width="50%"
                                        style="padding:8px 0; color:#333333; font-weight:bold; font-size:14px;">
                                        {{ $cus }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:8px 0; color:#777777; font-size:13px;">
                                        Email
                                    </td>

                                    <td style="padding:8px 0; color:#333333; font-size:14px;">
                                        {{ $email }}
                                    </td>
                                </tr>

                            </table>

                        </td>
                    </tr>


                    {{-- Product Details --}}
                    <tr>
                        <td style="padding:0 25px 25px;">

                            <h3 style="margin:0 0 15px; color:#333333; font-size:18px;">
                                Product Details
                            </h3>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="border-collapse:collapse;">

                                {{-- Table Header --}}
                                <tr style="background-color:#6c757d;">

                                    <th align="left"
                                        style="padding:12px; color:#ffffff; font-size:13px;">
                                        Product
                                    </th>

                                    <th align="center"
                                        style="padding:12px; color:#ffffff; font-size:13px;">
                                        Quantity
                                    </th>

                                    <th align="right"
                                        style="padding:12px; color:#ffffff; font-size:13px;">
                                        Tax
                                    </th>

                                    <th align="right"
                                        style="padding:12px; color:#ffffff; font-size:13px;">
                                        Amount
                                    </th>

                                </tr>


                                {{-- Products --}}
                                @foreach ($orderItems as $item)

                                    <tr>

                                        <td style="padding:12px; border-bottom:1px solid #eeeeee;
                                            color:#333333; font-size:14px;">

                                            {{ $item->product->name }}

                                        </td>

                                        <td align="center"
                                            style="padding:12px; border-bottom:1px solid #eeeeee;
                                            color:#333333; font-size:14px;">

                                            {{ $item->quantity }}

                                        </td>

                                        <td align="right"
                                            style="padding:12px; border-bottom:1px solid #eeeeee;
                                            color:#333333; font-size:14px;">

                                            {{ number_format($item->tax_percentage, 2) }}%

                                        </td>

                                        <td align="right"
                                            style="padding:12px; border-bottom:1px solid #eeeeee;
                                            color:#333333; font-size:14px; font-weight:bold;">

                                            ₹{{ number_format($item->line_total, 2) }}

                                        </td>

                                    </tr>

                                @endforeach

                            </table>

                        </td>
                    </tr>


                    {{-- Payment --}}
                    <tr>
                        <td style="padding:0 25px 25px;">

                            <h3 style="margin:0 0 15px; color:#333333; font-size:18px;">
                                Payment
                            </h3>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                style="background-color:#f8f9fa; border:1px solid #d9dee3;
                                border-radius:6px;">

                                {{-- Subtotal --}}
                                <tr>

                                    <td style="padding:10px 15px; color:#777777; font-size:14px;">
                                        Subtotal
                                    </td>

                                    <td align="right"
                                        style="padding:10px 15px; color:#333333;
                                        font-weight:bold; font-size:14px;">

                                        ₹{{ number_format($order->subtotal, 2) }}

                                    </td>

                                </tr>


                                {{-- Tax --}}
                                <tr>

                                    <td style="padding:10px 15px; color:#777777; font-size:14px;">
                                        Tax
                                    </td>

                                    <td align="right"
                                        style="padding:10px 15px; color:#333333;
                                        font-weight:bold; font-size:14px;">

                                        ₹{{ number_format($order->tax, 2) }}

                                    </td>

                                </tr>


                                {{-- Grand Total --}}
                                <tr>

                                    <td style="padding:12px 15px; border-top:2px solid #dee2e6;
                                        color:#333333; font-weight:bold; font-size:15px;">

                                        Grand Total

                                    </td>

                                    <td align="right"
                                        style="padding:12px 15px; border-top:2px solid #dee2e6;
                                        color:#0d6efd; font-weight:bold; font-size:16px;">

                                        ₹{{ number_format($order->grand_total, 2) }}

                                    </td>

                                </tr>

                            </table>

                        </td>
                    </tr>


                    {{-- Footer --}}
                    <tr>
                        <td align="center"
                            style="background-color:#f8f9fa; padding:20px; border-top:1px solid #eeeeee;">

                            <p style="margin:0; color:#777777; font-size:12px;">
                                Thank you for your order.
                            </p>

                            <p style="margin:6px 0 0; color:#999999; font-size:11px;">
                                This is an automated email. Please do not reply to this email.
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>

    </table>

</body>
</html>