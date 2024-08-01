
@extends('customer.event.edit')

@section('tab-content')
<section class="events">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h1 class="form-title">Template Pesan</h1>
                    <h2 class="form-text-secondary mt-2">
                        Template pesan digunakan pada saat mengirim pesan beserta link undangan.
                    </h2>
                    <form class="form-group" id="form_template_message">
                        @csrf
                        <input type="number" id="event_id" class="form-control" name="event_id"
                            value="{{ $event->id }}" hidden>
                        <div class="message-wrapper">
                            <textarea type="text" rows="15" class="message-body form-control"  name="message" id="message">{{ $event->templateMessage->message ?? '' }}</textarea>
                            <!-- <p class="message-body" id="message-body" style="font-size: 12px">
                                            <b>Assalamu'alaikum Wr. Wb.</b> <br />
                                            Bismillahirrahmanirrahim. <br />
                                            <br />
                                            Dengan memohon Rahmat dan Ridho Allah SWT. Tanpa
                                            mengurangi rasa hormat, Kami bermaksud ingin
                                            memberitahukan kepada Bapak/Ibu/Saudara/i dan
                                            Rekan-rekan bahwa kami akan melangsungkan Pernikahan
                                            yang Insya Allah akan dilaksanakan pada: <br />
                                            <br />
                                            Hari, tanggal: Saturday, 14 Nov 2021 <br />
                                            Invitation : $invitation_link <br />
                                            <br />
                                            Dikarenakan situasi pandemi Covid-19 belum membaik,
                                            Kami memutuskan untuk merayakannya hanya bersama
                                            keluarga dan beberapa teman-teman dekat. Kami
                                            memohon maaf tidak dapat mengundang
                                            Bapak/Ibu/Saudara/i dan Rekan-rekan sekalian menjadi
                                            bagian dihari bahagia kami. Dan yang paling penting
                                            tetap jaga kesahatan. <br />
                                            <br />
                                            Terimakasih atas pengertiannya dan memohon do'a
                                            restu dari Bapak/Ibu/Saudara/i dan rekan-rekan
                                            sekalian. <br />
                                            Wassalamu'alaikum Wr. Wb. <br />
                                            Kami yang berbahagia, <br />
                                            <b>Pria & Wanita </b>
                                        </p> -->
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-12">
                                <button class="btn btn-block btn-primary blue mt-3"
                                    id="btn_copy_message">
                                    <span class="iconify" data-icon="fa-regular:copy"
                                        style="font-size: 20px; vertical-align: -4px"></span>
                                    Copy to Clipboard
                                </button>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <button class="btn btn-block btn-primary yellow mt-3"
                                    id="btn_template_message_save" type="submit">
                                    <span class="iconify" data-icon="ic:outline-save-as"
                                        style="font-size: 20px; vertical-align: -4px"></span>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
