@extends('layouts.app')

@section('contents')
<h1 class="mb-0">Simulator</h1>
<br><br>
<div class="calculator">
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Order</label>
            <input type="number" id="T_Order" class="form-control" placeholder="Total Order" value="{{$totalOrdersWithSameProductCode}}">
        </div>    
        <div class="col mb-3">
            <label class="form-label">Total Delivered Order</label>
            <input type="number" id="TD_Order" class="form-control" placeholder="TD_Order" value="{{$totalOrdersWithSameProductDelivered}}">
        </div>        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Total Canceled Order</label>
            <input type="number" id="TC_Order" class="form-control" placeholder="TC_Order" value="{{$totalOrdersWithSameProductConfirm}}">
        </div>      
        <div class="col mb-3">
            <label class="form-label">Shipping Cost</label>
            <input type="number" id="SH_COST" class="form-control" placeholder="Shipping Cost" value="4">
        </div>       
    </div>
    <div class="row">     
        <div class="col mb-3">
            <label class="form-label">CPO</label>
            <input type="number" id="CPO" class="form-control" placeholder="CPO">
        </div>    
        <div class="col mb-3">
            <label class="form-label">Product COST</label>
            <input type="number" id="P_COST" class="form-control" placeholder="Product Cost">
        </div>
        <div class="col mb-3">
            <label class="form-label">AOV</label>
            <input type="number" id="AOV" class="form-control" placeholder="AOV"> 
        </div> 
    </div>
    <br><br>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary" onclick="calculate()">Calculer</button>
        </div>
    </div>
</div> 
<br><br>
<table id="datatablesSimple">
        <thead  class="table-primary">
            <tr>
                <th>C_Rate</th>
                <th>D_Rate</th>
                <th>Ads_Spend</th>
                <th>TC_March</th>
                <th>CPC</th>
                <th>CPD</th>
                <th>Net_Profit</th>
                <th>Profit/Pcs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="aling-midle"><input type="text" id="C_Rate" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled>%</td>
                <td class="aling-midle"><input type="text" id="D_Rate" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled>%</td>
                <td class="aling-midle"><input type="text" id="Ads_Spend" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
                <td class="aling-midle"><input type="text" id="TC_March" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
                <td class="aling-midle"><input type="text" id="CPC" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
                <td class="aling-midle"><input type="text" id="CPD" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
                <td class="aling-midle"><input type="text" id="Net_Profit" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
                <td class="aling-midle"><input type="text" id="Profit_Pcs" style="border: unset; width: 55px;background-color: rgb(251 251 251 / 50%);" disabled></td>
            </tr>
        </tbody>
</table> 
<script>
    function calculate() {
        const T_Order = parseFloat(document.getElementById('T_Order').value);
        const TD_Order = parseFloat(document.getElementById('TD_Order').value);
        const TC_Order = parseFloat(document.getElementById('TC_Order').value);
        const CPO = parseFloat(document.getElementById('CPO').value);
        const P_COST = parseFloat(document.getElementById('P_COST').value);
        const SH_COST = parseFloat(document.getElementById('SH_COST').value);
        const AOV = parseFloat(document.getElementById('AOV').value);
        let Ads_Spend = 0;

        Ads_Spend = T_Order * CPO;
        TC_March = P_COST * TD_Order;
        D_Rate = (TC_Order / TD_Order) * 100;
        CPD = T_Order * D_Rate;
        Profit_Pcs = AOV - SH_COST - P_COST - CPD;
        Net_Profit = Profit_Pcs * TD_Order;
        C_Rate = ( TC_Order/ T_Order) * 100;
        CPC = T_Order * C_Rate;

        document.getElementById('Ads_Spend').value = Ads_Spend;
        document.getElementById('TC_March').value = TC_March;
        document.getElementById('D_Rate').value = D_Rate;
        document.getElementById('CPD').value = CPD ;
        document.getElementById('Profit_Pcs').value = Profit_Pcs;
        document.getElementById('Net_Profit').value = Net_Profit;
        document.getElementById('C_Rate').value = C_Rate;
        document.getElementById('CPC').value = CPC;
        
    }
</script>
@endsection
