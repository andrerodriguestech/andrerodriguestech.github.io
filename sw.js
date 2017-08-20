'use strict';

var CACHE_NAME = 'ml-cache-v1.02';

var urlsToCache = [
  'public/images/badge.png',
  'public/images/launcher-icon-1x.png',
  'public/images/launcher-icon-2x.png',
  'public/images/launcher-icon-256x256.png',
  'public/images/launcher-icon-4x.png',
  'public/images/launcher-icon-512x512.png',
  'public/images/launcher-icon-8x.png',
  'public/scripts/main.js',
  'public/styles/main.css',
  'favicon.ico',
  'public/images/icon.png',
  'index.html',
  'manifest.json',
  'sw.js'
];

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('activate', function(event) {

  var cacheWhitelist = ['ml-cache-v1.02'];

  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
          return response;
        }

        // IMPORTANT: Clone the request. A request is a stream and
        // can only be consumed once. Since we are consuming this
        // once by cache and once by the browser for fetch, we need
        // to clone the response.
        var fetchRequest = event.request.clone();

        return fetch(fetchRequest).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});

self.addEventListener('push', function(event) {
  const title = 'Progressive Web App';
  const options = {
    body: `${event.data.text()}`,
    icon: 'public/images/icon.png',
    badge: 'public/images/badge.png'
  };

  const notificationPromise = self.registration.showNotification(title, options);
  event.waitUntil(notificationPromise);
});

self.addEventListener('notificationclick', function(event) {
  event.notification.close();

  event.waitUntil(
    clients.openWindow('https://andrerodriguestech.github.io/')
  );
});
