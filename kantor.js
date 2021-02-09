var weathericon = {
	'100': 'Cerah', 
	'101': 'Cerah Berawan', 
	'102': 'Cerah Berawan', 
	'103': 'Berawan', 
	'104': 'Berawan Tebal', 
    '0': 'Cerah',
    '1': 'Cerah Berawan',
    '2': 'Cerah Berawan',
    '3': 'Berawan',
    '4': 'Berawan Tebal',
    '5': 'Udara Kabur',
    '10': 'Asap',
    '45': 'Kabut',
    '60': 'Hujan Ringan',
    '61': 'Hujan Sedang',
    '63': 'Hujan Lebat',
    '80': 'Hujan Lokal',
    '95': 'Hujan Petir',
    '97': 'Hujan Petir'
};

function loadall() {
    $.ajax({
        url: "data/cuaca.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            var now = new Date;
            var utc_time = parseInt(new Date().getTime());
            $("#prakicu").html("");
            var allkota = [];
            var area = result.forecast.area;
            var timestatus = new Date().getHours() - 1;
            for (i = 0; i < area.length; i++) {
                //console.log(area[i]['@attributes'].id);
                var id = area[i]['@attributes'].id;
                var kota = area[i]['@attributes'].description;
                //console.log(kota);
                var hu = 0;
                var humax = 0;
                var tmax = 0;
                var humin = 0;
                var tmin = 0;
                var t = 0;
                var weather = '';
                var wd = 0;
                var ws = 0;
                var ampm = 'pm';
                var parameter = area[i].parameter;
                if (parameter === undefined) continue;
                for (j = 0; j < parameter.length; j++) {
                    var idparam = parameter[j]['@attributes'].id;
                    //console.log(idparam);
                    var timerange = parameter[j].timerange;
                    for (k = timerange.length - 1; k >= 0; k--) {
                        var datetime = timerange[k]['@attributes'].datetime;
                        var time = new Date(datetime.substring(0, 4), datetime.substring(4, 6) - 1, datetime.substring(6, 8), datetime.substring(8, 10), datetime.substring(10, 12), 0, 0).getTime();
                        var value = timerange[k].value;
                        if (idparam == 'hu') {
                            if (utc_time > time - 10800000) {
                                hu = value;
                                if (parseInt(datetime.substring(8, 10)) >= 6 && parseInt(datetime.substring(8, 10)) < 18) ampm = 'am';
                                /*console.log(time);
                                console.log(time-10800000);
                                console.log(utc_time);*/
                                break;
                            }
                        } else if (idparam == 'humax') {
                            if (utc_time > time - 43200000) {
                                humax = value;
                                /*console.log(time);
                                console.log(time-43200000);
                                console.log(utc_time);*/
                                break;
                            }
                        } else if (idparam == 'tmax') {
                            if (utc_time > time - 43200000) {
                                tmax = value[0];
                                break;
                            }
                        } else if (idparam == 'humin') {
                            if (utc_time > time - 43200000) {
                                humin = value;
                                break;
                            }
                        } else if (idparam == 'tmin') {
                            if (utc_time > time - 43200000) {
                                tmin = value[0];
                                break;
                            }
                        } else if (idparam == 't') {
                            if (utc_time > time - 10800000) {
                                t = value[0];
                                break;
                            }
                        } else if (idparam == 'weather') {
                            if (utc_time > time - 10800000) {
                                weather = weathericon[value];
                                break;
                            }
                        } else if (idparam == 'wd') {
                            if (utc_time > time - 10800000) {
                                wd = value[1];
                                break;
                            }
                        } else if (idparam == 'ws') {
                            if (utc_time > time - 10800000) {
                                ws = value[2];
                                break;
                            }
                        }
                    }
                }
				
                allkota.push('<div class="col-width-full id-' + id + '"><div style="height:54vh;" class="carousel-block-table prakicu-kota bg-cuaca ' + weather.toLowerCase().replace(' ', '-') + '-' + (ampm == 'pm' ? 'malam' : 'siang') + '"><div class="service-block clearfix"><h2 class="kota">' + kota + '</h2><div class="kiri"><img src="img/icon-cuaca/' + weather.toLowerCase() + '-' + ampm + '.png" alt="' + weather.toLowerCase() + '"><p>' + weather + '</p></div><div class="kanan"><h2 class="heading-md">' + t + '&deg;C</h2><p><i class="wi wi-direction-down"></i>' + tmin + '&deg;C<i class="wi wi-direction-up"></i>' + tmax + '&deg;C</p><p><i class="wi wi-raindrop"></i>' + hu + '%</p><p><i class="wi wi-strong-wind"></i>' + ws + 'km/jam<br>' + wd + '<i class="wi wi-wind wi-from-' + wd.toLowerCase() + '"></i></p></div><a class="link-block" target="_blank" href="prakicu.php?id=' + id + '"></a></div></div></div>');
            }
            var waktu = '';
            console.log(timestatus);
            if (timestatus < 6) waktu = 'Pagi Hari';
            else if (timestatus >= 6 && timestatus < 12) waktu = 'Siang Hari';
            else if (timestatus >= 12 && timestatus < 18) waktu = 'Malam Hari';
            else if (timestatus >= 18) waktu = 'Dini Hari';
            document.getElementById("jdlprakicu").innerHTML = "Prakiraan Cuaca Jawa Timur " + waktu;

            $("#prakicu").append(allkota.join(''));
            OwlBMKG.initOwlPrakicuKota();
        }
    });
}

function loadjuanda() {
    $.ajax({
        url: "data/juanda.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            var obs = result.obs.report;
            $("#cuacajuanda").html('<div class="prakicu-kota bg-cuaca cerah-berawan-malam"><div class="service-block clearfix"><h2 class="kota">' + obs.station_name + '</h2><p>' + obs.time + '</p><div class="kiri"><img src="img/symbols/' + obs.symbol + '.png" alt="cerah berawan"><p>' + obs.weather + '</p></div><div class="kanan"><h2 class="heading-md"><i class="wi wi-thermometer"></i>' + obs.temp + '°C</h2><p><i class="wi wi-fog"></i>' + obs.visibility + '</p><p><i class="wi wi-strong-wind"></i>' + obs.wind_speed + 'km/jam<br>' + obs.wind_dir + '<i class="wi wi-wind wi-from-w"></i></p></div></div></div>');
            var fcst = result.fcst.report;
            $("#prakicujuanda").html('<div class="prakicu-kota bg-cuaca cerah-berawan-malam"><div class="service-block clearfix"><h2 class="kota">' + fcst.station_name + '</h2><p>' + fcst.from + ' - ' + fcst.until + '</p><div class="kiri"><img src="img/symbols/' + fcst.symbol + '.png" alt="cerah berawan"><p>' + fcst.weather + '</p></div><div class="kanan"><p><i class="wi wi-thermometer"></i><i class="wi wi-direction-down"></i>' + fcst.temp_min + '°C<i class="wi wi-direction-up"></i>' + fcst.temp_max + '°C</p><p><i class="wi wi-strong-wind"></i>' + fcst.wind_speed + 'km/jam<br>' + fcst.wind_dir + '<i class="wi wi-wind wi-from-w"></i></p></div></div></div>');
        }
    });
}

function loadmarning() {
    $.ajax({
        url: "data/warning.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#warninglist").html("");
            var warninglist = [];
            var warningall = [];
            for (i = 0; i < result.length; i++) {
                warninglist.push('<div><strong>' + result[i].tanggal + '</strong>' + result[i].warningisi.split(' di ')[0] + '<a class="moree"> Selengkapnya&rarr;</a><a class="link-block" href="javascript:callperingatanModal();"></a></div>');
                warningall.push('<div><strong>' + result[i].tanggal + '</strong>' + result[i].warningisi + '<a class="link-block" href="javascript:callperingatanModal();"></a></div>');
            }
            if (result.length < 1) warninglist.push('<div><strong>Tidak Ada Peringatan Dini</strong></div>');
            $("#warninglist").append(warninglist.join(''));
			
			$("#warninglistmodal").html("");
			$("#warninglistmodal").append(warningall.join(''));

            OwlBMKG.initOwlPeringatanDini();
        }
    });
}

function loadberita() {
    $.ajax({
        url: "data/berita.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#masterslider").html("");
            var beritalist = [];
            for (i = 0; i < result.length; i++) {
                beritalist.push('<div class="ms-slide blog-slider"><img src="img/blank.gif" data-src="manage/berita/' + result[i].gambar.split("/")[0] + '"/><div class="ms-info"></div><div class="blog-slider-title"><span class="blog-slider-posted">' + result[i].tanggal + '</span><h2><a href="berita.php?id=' + result[i].id + '">' + result[i].judul + '</a></h2></div><div class="ms-thumb"><p>' + result[i].judul + '</p></div></div>');
            }
            $("#masterslider").append(beritalist.join(''));
			if(beritalist.length>0)
				MasterSliderShowcase3.initMasterSliderShowcase3();
        }
    });
}

function loadpers() {
    $.ajax({
        url: "data/siaranpers.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#siaranpers").html("");
            var perslist = [];
            for (i = 0; i < result.length; i++) {
                perslist.push('<div class="blog-thumb margin-bottom-20"><div class="blog-thumb-mkg"><img src="manage/berita/' + result[i].gambar.split("/")[0] + '" alt=""></div><div class="blog-thumb-desc"><h3><a href="pers.php?id=' + result[i].id + '">' + result[i].judul + '</a></h3><ul class="blog-thumb-info"><li>' + result[i].tanggal + '</li></ul></div></div>');
            }
            $("#siaranpers").append(perslist.join(''));
        }
    });
}

function loadgempa() {
    $.ajax({
        url: "data/gempadirasakan.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#waktugempadirasakan").html(result.Gempa[0].Tanggal);
            $("#magnitudegempadirasakan").html(result.Gempa[0].Magnitude);
            $("#kedalamangempadirasakan").html(result.Gempa[0].Kedalaman);
            $("#koordinatgempadirasakan").html(result.Gempa[0].Posisi);
            $("#lokasigempadirasakan").html(result.Gempa[0].Dirasakan);
            $("#dirasakangempadirasakan").html(result.Gempa[0].Keterangan);
        }
    });
    $.ajax({
        url: "data/gempaterkini.json",
        dataType: "JSON",
        type: "GET",
        success: function(result) {
            $("#waktugempaterkini").html(result.gempa[0].Tanggal + " " + result.gempa[0].Jam);
            $("#magnitudegempaterkini").html(result.gempa[0].Magnitude);
            $("#kedalamangempaterkini").html(result.gempa[0].Kedalaman);
            $("#koordinatgempaterkini").html(result.gempa[0].Lintang + " " + result.gempa[0].Bujur);
            $("#lokasigempaterkini").html(result.gempa[0].Wilayah);
            $("#tsunamigempaterkini").html(result.gempa[0].Keterangan);
        }
    });
}

$(function() {
    $(document).ready(function() {
        loadall();
        loadjuanda();
        loadmarning();
        loadberita();
        loadpers();
        loadgempa();
    });
});

var MasterSliderShowcase3 = function() {
        return {
            initMasterSliderShowcase3: function() {
                jQuery(document).ready(function() {
                var a = new MasterSlider;
                a.control("arrows"), a.control("circletimer", {
                    color: "#fff",
                    stroke: 9
                }), a.control("thumblist", {
                    autohide: !1,
                    dir: "h",
                    type: "tabs",
                    width: 187.5,
                    height: 135,
                    align: "bottom",
                    space: 0,
                    margin: -12,
                    hideUnder: 992
                }), a.setup("masterslider", {
                    width: 1140,
                    height: 550,
                    space: 0,
                    speed: 10,
                    preload: "all",
                    view: "basic",
                    autoplay: !0
                })
				
                })
            }
        }
    }(),
    OwlBMKG = function() {
        return {
            initOwlPrakicuKota: function() {
                jQuery(document).ready(function() {
                    var a = jQuery(".owl-prakicu-kota");
                    a.owlCarousel({
                        items: [8],
                        itemsDesktop: [1200, 8],
                        itemsDesktopSmall: [992, 4],
                        itemsTablet: [600, 2],
                        itemsMobile: [479, 1],
                        autoPlay: 5e3
                    }), jQuery(".next-pk").click(function() {
                        a.trigger("owl.next")
                    }), jQuery(".prev-pk").click(function() {
                        a.trigger("owl.prev")
                    })
                })
            },
            initOwlPeringatanDini: function() {
                jQuery(document).ready(function() {
                    var a = jQuery(".owl-peringatan-dini");
                    a.owlCarousel({
                        items: [1],
                        itemsDesktop: [1200, 1],
                        itemsDesktopSmall: [992, 1],
                        itemsTablet: [600, 1],
                        itemsMobile: [479, 1],
                        autoPlay: 5e3
                    })
                })
            }
        }
    }();
