<div class="row">
    <div class="col m6 s12 offset-m3">
        <form>
        <div class="card-panel">
            <div class="row">
                <div class="col m5 s12">
                    <div class="input-field">
                        <label for="start_dt">Check-in date</label>
                        <input input-date type="text" id="start_dt" ng-model="search_param.start_dt"  format="d-m-yyyy"/>
                    </div>
                </div>
                <div class="col m5 s12">
                    <div class="input-field">
                        <label for="end_dt">Check-in date</label>
                        <input input-date type="text" id="end_dt" ng-model="search_param.end_dt"  format="d-m-yyyy"  />
                    </div>
                </div>
                <div class="col m2 s12">
                    <label for="occupancy">Persons</label>
                    <select class="" id="occupancy" ng-model="search_param.min_occupancy" material-select>
                        <option ng-repeat="value in select_occupancy" value="{{value}}">{{value}}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col m4 offset-m4">
                    <button ng-click="search()" class="btn">Search</button>
                </div>
            </div>
         </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col s12 m6" ng-repeat = "room_type in available_room_types">
        <div class="card blue-grey darken-1">
            <div class="card-content white-text">
                <span class="card-title">{{room_type.name}}</span>
                <p>Total price : {{room_type.total_price}}</p>
            </div>
            <div class="card-action">
                <a href="" ng-click="book($index)">Book this</a>
            </div>
        </div>
    </div>
</div>