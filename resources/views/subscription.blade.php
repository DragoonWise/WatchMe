@extends('layouts.app')
@section('description')
{{ __('main.description') }}@endsection
@section('title')
WatchMe - {{ __('account.subscription') }}
@endsection
@section('content')
<div class="mx-3 bg-beige shadow">
    <h1 class="text-center pt-2 font-weight-bold">{{ __('account.subscription') }}</h1>
    <form action="">
        <div class="d-md-flex">
            {{-- Formula block --}}
            <div id="formula_block" class="col-12 col-md-6 px-5 pb-5">
                <h2 class="text-center font-weight-bold">Forfait</h2>

                @foreach($formulas as $formula)
                <div class="custom-control custom-radio">
                    <input type="radio" id="formula{{$formula->id}}" name="formula" class="custom-control-input">
                    <label class="custom-control-label" for="formula{{$formula->id}}"><span
                            class="font-weight-bold">{{$formula->formula}}</span> - {{$formula->amount}} €</label>
                    <p>{{$formula->description}}</p>
                </div>
                @endforeach
                <br>
                <p>Regardez WatchMe sur 1 écran en définition standard. Tous les forfaits offrent un accès
                    illimité aux films et aux séries TV, sur tous vos appareils. La disponibilité de la HD (720p), de la
                    Full HD (1080p), de l'Ultra HD (4K) et de la HDR dépend de votre connexion Internet et des capacités
                    de
                    l'appareil. Les contenus ne sont pas tous disponibles en HD, Full HD, Ultra HD ou
                    HDR.<br>L'abonnement
                    est renouvelé automatiquement à l'issue de la période stipulée par le forfait, et ce jusqu'à
                    résiliation
                    de l'abonnement. En cas de résiliation, vous continuez de profiter des bénéfices de l'abonnement
                    jusqu'à
                    la date d'expiration de celui-ci.</p>
            </div>
            {{-- Paiement method block --}}
            <div id="method_block" class="col-12 col-md-6 px-5 pb-5">
                <h2 class="text-center font-weight-bold">Moyen de paiement</h2>
                {{-- Method Choice --}}
                <div class="d-flex align-items-center justify-content-center">
                    <button id="credit_card_btn" class="btn btn-dark text-center d-flex mx-2"><i
                            class="far fa-credit-card fs-30"></i>
                        <p class="fs-20 ml-2 mb-0">Carte bancaire</p>
                    </button>
                    <button id="paypal_btn" class="btn btn-dark text-center d-flex mx-2"><i
                            class="fab fa-cc-paypal fs-30"></i>
                        <p class="fs-20 ml-2 mb-0">Paypal</p>
                    </button>
                </div>
                {{-- Credit Card Form --}}
                <div id="credit_block" class="hidden">credit</div>
                {{-- Paypal Form --}}
                <div id="paypal_block" class="hidden">
                    <table border="0" cellpadding="10" cellspacing="0" align="center">
                        <tr>
                            <td align="center"></td>
                        </tr>
                        <tr>
                            <td align="center">
                                <a href="{{ route('payment') }}">
                                    <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png"
                                        border="0" alt="PayPal Logo">
                                </a>
                            </td>
                        </tr>
                    </table>




                </div>

            </div>
        </div>
        <div class="text-center pb-2"><button type="submit" name="update"
                class="btn bg-dark beige font-weight-bold mt-4 fs-20 shadow-sm">{{ __('account.subscribe') }} </button>
        </div>
    </form>
</div>

@endsection