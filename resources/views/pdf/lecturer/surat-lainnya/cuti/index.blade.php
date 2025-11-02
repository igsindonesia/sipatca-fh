@php
$data = json_decode($submission->data, true)
@endphp

<!DOCTYPE html>
<html lang="en" style="width: 21cm; height: 29cm; margin: 0px;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Lainnya Cuti</title>

    <style>
        td {
            vertical-align: top;
            padding: 0px 3px;
        }

        .p-0 {
            padding: 0px;
        }

        .d-block {
            display: block;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .text-center {
            text-align: center;
        }

        .text-justify {
            text-align: justify;
        }

        .text-indent {
            text-indent: 30px;
        }

        .text-info {
            font-size: 12px;
            color: #888;
        }

        .lh-1-5 {
            line-height: 1.5;
        }

        .vertical-align-middle {
            vertical-align: middle;
        }

        .vertical-align-top {
            vertical-align: top;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: 700;
        }

        .bolder {
            font-weight: 900;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .logo {
            height: auto;
            width: 100px;
        }

        .pb-10 {
            padding-bottom: 10px;
        }

        .py-10 {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .px-10 {
            padding-left: 10px;
            padding-right: 10px;
        }

        .px-50 {
            padding-left: 50px;
            padding-right: 50px;
        }

        .py-50 {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .mt-16 {
            margin-top: 16px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .ml-30 {
            margin-left: 30px;
        }

        .m-0 {
            margin: 0;
        }

        td:empty::after {
            content: "\00a0";
        }

        .ttd {
            width: auto;
            height: 2cm;
        }

        .watermark {
            background-image: url('{{ asset("website/img/logo-upn.png") }}');
            background-repeat: no-repeat;
            background-size: 99%;
            background-position: top center;
            position: absolute;
            opacity: 0.2;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .fit {
            width: 1%;
            white-space: nowrap;
        }
    </style>
</head>

<body style="width: 21cm; height: 29cm; margin: 0px; position: relative;">
    <div class="watermark"></div>
    <div class="px-50 py-50">
        @include('pdf.partials.kop')

        <section class="mt-16">
            <table style="width: 100%;">
                <tr>
                    <td class="p-0">
                        <table>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td class="bold">{{ $submission->formattedLetterNumber }}</td>
                            </tr>
                            <tr>
                                <td>Lampiran</td>
                                <td>:</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Perihal</td>
                                <td>:</td>
                                <td class="bold underline">Permohonan Cuti</td>
                            </tr>
                        </table>
                    </td>
                    <td class="p-0 fit">
                        Surabaya, {{ Carbon\Carbon::parse($submission->approved_at)->locale('id_ID')->translatedFormat('d F Y') }}
                    </td>
                </tr>
            </table>

            <table class="mt-16">
                <tr>
                    <td>Kepada Yth:</td>
                </tr>
                <tr>
                    <td class="bold">Wakil Rektor II</td>
                </tr>
                <tr>
                    <td>UPN "Veteran" Jawa Timur</td>
                </tr>
                <tr>
                    <td>di Surabaya</td>
                </tr>
            </table>
        </section>

        <section class="mt-16">
            <table style="width: 100%;">
                <tr>
                    <td class="fit">1.</td>
                    <td class="fit">Dasar</td>
                    <td>:</td>
                    <td>
                        Surat Permohonan Cuti atas nama {{ $data['nama'] }}, {{ $data['jabatan'] }}
                        perihal ajuan cuti tertanggal {{ Carbon\Carbon::parse($submission->created_at)->locale('id_ID')->translatedFormat('d F Y') }}.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="fit">2.</td>
                    <td colspan="3">Sehubungan dengan butir 1 (satu) tersebut diatas, bahwa :</td>
                </tr>
                <tr>
                    <td class="fit"></td>
                    <td class="fit">Nama</td>
                    <td class="fit">:</td>
                    <td>{{ $data['nama'] }}</td>
                </tr>
                <tr>
                    <td class="fit"></td>
                    <td class="fit">NIP</td>
                    <td class="fit">:</td>
                    <td>{{ $data['nip'] }}</td>
                </tr>
                <tr>
                    <td class="fit"></td>
                    <td class="fit">Jabatan</td>
                    <td class="fit">:</td>
                    <td>{{ $data['jabatan'] }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $data['fakultas'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">
                        Memohon untuk dapat diberikan cuti terhitung mulai tanggal {{ Carbon\Carbon::parse($data['tanggal_mulai'])->locale('id_ID')->translatedFormat('d F Y') }} s/d {{ Carbon\Carbon::parse($data['tanggal_selesai'])->locale('id_ID')->translatedFormat('d F Y') }}, dengan alasan
                        {{ $data['alasan'] }}.
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td colspan="3">
                        Demikian permohonan ini dibuat, atas perhatian dan kebijaksanaannya disampaikan terima kasih.
                    </td>
                </tr>
            </table>
        </section>

        <section class="mt-50">
            <table class="w-100">
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold capitalize">{{ $submission->approvedByEmployee->position->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold">Fakultas Hukum</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td style="position: relative;">
                        <img src="{{ asset('website/img/stempel.png') }}" alt="stempel" style="position: absolute; top: 0; left: 0; transform: translate(-25%, -25%); width: 200px; height: auto; z-index: 1;">
                        <img class="ttd" src="{{ $submission->approvedByEmployee->signatureImage }}" alt="ttd" style="position: relative; z-index: 0;">
                    </td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="bold underline">{{ $submission->approvedByEmployee->name }}</td>
                </tr>
                <tr class="text-center">
                    <td class="w-50"></td>
                    <td class="">{{ $submission->approvedByEmployee->registration_type }}. {{ $submission->approvedByEmployee->registration_number }}</td>
                </tr>
            </table>
        </section>

        <section class="mt-16">
            <p class="text-justify lh-1-5 underline m-0">Tembusan :</p>
            <p class="text-justify m-0">1. Koordinator Bidang Kepegawaian</p>
        </section>
    </div>
</body>

</html>