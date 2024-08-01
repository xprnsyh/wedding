

@extends('admin.event.edit')

@section('tab-content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h1 class="form-title">Quote Section</h1>
                <h2 class="form-text-secondary mt-2">
                    Quote ini akan digunakan untuk mengisi section yang ada di undangan.
                </h2>
                <form class="form-group" id="form_text_section_quote">
                    @csrf
                    <input type="number" id="event_id" class="form-control" name="event_id"
                        value="{{ $event->id }}" hidden>
                    <div class="message-wrapper">
                        <textarea type="text" rows="10" class="message-body form-control"  name="quote" id="quote"
                            placeholder="Dan diantara tanda-tanda kekuasaan-Nya ialah
                            &#10;Dia menciptakan untukmu istri-istri dari jenismu sendiri supaya kamu cenderung dan
                            &#10;merasa tentram kepadanya dan dijadikan-Nya diantaramu rasa kasih dan sayang.
                            &#10;Sesungguhnya pada yang demikian itu benar-benar terdapat tanda tanda bagi kaum yang berfikir
                            &#10;(QS Ar-Rum 21)">{{ $text->quote ?? '' }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <button class="btn btn-block btn-primary yellow mt-3"
                                id="btn_text_section_quote_save" type="submit">
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
    <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h1 class="form-title">Perkenalan Section</h1>
                <h2 class="form-text-secondary mt-2">
                    Perkenalan ini akan digunakan untuk mengisi awal section yang ada di undangan.
                </h2>
                <form class="form-group" id="form_text_section_title">
                    @csrf
                    <input type="number" id="event_id" class="form-control" name="event_id"
                        value="{{ $event->id }}" hidden>
                    <div class="message-wrapper">
                        <textarea type="text" rows="10" class="message-body form-control"  name="title" id="title"
                            placeholder="Bismillahirrahmanirrahim
                            &#10;Assalamu'alaikum Warahmatullahi Wabarakatuh
                            &#10;Maha Suci Allah yang telah menciptakan mahkluk-Nya berpasang-pasangan
                            &#10;Ya Allah, perkenankanlah putra-putri kami:">{{ $text->title ?? '' }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12">
                            <button class="btn btn-block btn-primary yellow mt-3"
                                id="btn_text_section_title_save" type="submit">
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
@endsection
