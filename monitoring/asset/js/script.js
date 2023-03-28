var clientId;
var username;
var timedate;
var refresh=5;
var token;
var ina,inb,inc,ind,ine,inf,ing,inh,sena,senb,senc,send,sene,senf,seng,senh;

window.onload=function() {
    GetUrl()
    SetContentTag();


    setInterval(function() {
        SetContentTag();
    },refresh*1000);
}


function GetUrl() {
    var url_str=window.location.href;
    var url=new URL(url_str);

    clientId=url.searchParams.get("id");
    token=url.searchParams.get("tkn");
    var refreshValue=parseInt(url.searchParams.get("refresh"));
    console.log(refreshValue);
    if(refreshValue>0){
        refresh=refreshValue;
    }

}

function Get(myUrl){
    let httpreq=new XMLHttpRequest();
    httpreq.open("GET",myUrl,false);
    httpreq.send(null);
    return httpreq.responseText;
}


function GetDataFromApi(){
    var hostData="http://hoshikala.ir/iot/wil/loglastjson.php?id="+clientId+"&tkn="+token;
    var json_obGetData=JSON.parse(Get(hostData));

    username = json_obGetData.username;
    timedate = String(json_obGetData.time_date);

    ina = parseFloat(parseFloat(json_obGetData.ina) / 100);
    inb = parseFloat(parseFloat(json_obGetData.inb) / 100);
    inc = parseFloat(parseFloat(json_obGetData.inc) / 100);
    ind = parseFloat(parseFloat(json_obGetData.ind) / 100);
    ine = parseFloat(parseFloat(json_obGetData.ine) / 100);
    inf = parseFloat(parseFloat(json_obGetData.inf) / 100);
    ing = parseFloat(parseFloat(json_obGetData.ing) / 100);
    inh = parseFloat(parseFloat(json_obGetData.inh) / 100);

    sena = json_obGetData.sena;
    senb = json_obGetData.senb;
    senc = json_obGetData.senc;
    send = json_obGetData.send;
    sene = json_obGetData.sene;
    senf = json_obGetData.senf;
    seng = json_obGetData.seng;
    senh = json_obGetData.senh;

}


function SetContentTag(){
    GetDataFromApi();
    document.getElementById("txtDateTime").textContent=timedate;
    document.getElementById("txtClientId").textContent=clientId;
    document.getElementById("txtUsername").textContent=username;
    document.getElementById("txtRefresh").textContent=refresh;

    document.getElementById("txtparama").textContent=ina;
    document.getElementById("txtparamb").textContent=inb;
    document.getElementById("txtparamc").textContent=inc;
    document.getElementById("txtparamd").textContent=ind;
    document.getElementById("txtparame").textContent=ine;
    document.getElementById("txtparamf").textContent=inf;
    document.getElementById("txtparamg").textContent=ing;
    document.getElementById("txtparamh").textContent=inh;

    document.getElementById("txtstra").textContent=sena;
    document.getElementById("txtstrb").textContent=senb;
    document.getElementById("txtstrc").textContent=senc;
    document.getElementById("txtstrd").textContent=send;
    document.getElementById("txtstre").textContent=sene;
    document.getElementById("txtstrf").textContent=senf;
    document.getElementById("txtstrg").textContent=seng;
    document.getElementById("txtstrh").textContent=senh;







}
