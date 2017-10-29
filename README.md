# You-tube-video-marker-by-location
The project displays videos that were posted on certain location. It includes one main module which further uses 3 modules viz .
1. Google Maps Geocoding WS: input: location (street address); output: longitude, latitude
2. YouTube WS: input: keyword, longitude, latitude, radius; output: title, video id, longitude, latitude
3. Google Maps JavaScript WS: input: title, video id, longitude, latitude; output: a map with video markers.

Finally, we display the video snapshots present on the location. Also, the You Tube API has certain configurable parameters like no. of videos, diameter of locationand so on.

What you need:
1) Apache Server or XAMPP/WAMP
2) Javascript compatible browser

And you are good to go...

Just clone the repo to your development envionment and get going.

Happy Scripting !!
