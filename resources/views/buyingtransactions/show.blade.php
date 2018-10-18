@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="text-left">
              <h2>Buying Transaction</h2>
                <div class="card align-self-center" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/cover_images/{{$point_of_sale->cover_image}}" alt="Card image cap">
                </div>
              <p class="lead">{{$point_of_sale->name}}</p>
              <p class="lead">{{$point_of_sale->description}}</p>
            </div>
      
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Your cart</span> <span class="badge badge-secondary badge-pill">3</span></h4>
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$12</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$8</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$5</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                          </div>
                          <span class="text-success">-$5</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span> <strong>$20</strong></li>
                    </ul>
                    <form wtx-context="9B337B64-2B09-4A37-9440-690F683E0400" class="card p-2">
                      <div class="input-group">
                          <input type="text" placeholder="Promo code" wtx-context="5C3E0F1E-20E1-4ED4-A2B6-DEDBBDC99364" class="form-control"> 
                          <div class="input-group-append"><button type="submit" class="btn btn-secondary">Redeem</button></div>
                      </div>
                    </form>
                </div>


                
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3"><span class="text-muted">Your cart</span> <span class="badge badge-secondary badge-pill">3</span></h4>
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Product name</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$12</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$8</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">$5</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                          <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                          </div>
                          <span class="text-success">-$5</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span> <strong>$20</strong></li>
                    </ul>
                    <form wtx-context="9B337B64-2B09-4A37-9440-690F683E0400" class="card p-2">
                      <div class="input-group">
                          <input type="text" placeholder="Promo code" wtx-context="5C3E0F1E-20E1-4ED4-A2B6-DEDBBDC99364" class="form-control"> 
                          <div class="input-group-append"><button type="submit" class="btn btn-secondary">Redeem</button></div>
                      </div>
                    </form>
                </div>
                
            </div>


            
      
            <footer class="my-5 pt-5 text-muted text-center text-small">
              <p class="mb-1">© 2017-2018 Company Name</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
              </ul>
            </footer>
          </div>
    
@endsection