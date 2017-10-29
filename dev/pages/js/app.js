function tplawesome(e,t){res=e;for(var n=0;n<t.length;n++){res=res.replace(/\{\{(.*?)\}\}/g,function(e,r){return t[n][r]})}return res}

$(function() {

    $("form").on("submit", function(e) {
       e.preventDefault();
       // prepare the request

       var lat=document.getElementById("lat").value;
       var long=document.getElementById("long").value;
       var loc=lat +','+long;

       //"37.42307,-122.08427"

       var request = gapi.client.youtube.search.list({
            part: "snippet",
            type: "video",
            q: encodeURIComponent($("#search").val()).replace(/%20/g, "+"),
            location: loc,
            locationRadius: "15km",
            maxResults: 10,
            order: "viewCount"
       });

      var rakya= "Rakesh here --- Pratham";
       // execute the request
       request.execute(function(response) {
          var results = response.result;
          $("#results").html("");
          $.each(results.items, function(index, item) {
          console.log(item);
            $.get("tpl/item.html", function(data) {
                $("#results").append(tplawesome(data, [{"title":item.snippet.title, "videoid":item.id.videoId, "location":location}]));
            });
          });
          resetVideoHeight();
       });
    });

    $(window).on("resize", resetVideoHeight);
});

function resetVideoHeight() {
    $(".video").css("height", $("#results").width() * 9/16);
}

function init() {
    gapi.client.setApiKey("AIzaSyBuaj7JJIpuH9d2QJerAO_Vvq4z9iJrgWQ");
    gapi.client.load("youtube", "v3", function() {
        // yt api is ready
    });
}
