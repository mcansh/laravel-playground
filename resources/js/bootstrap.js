let originalFetch = window.fetch;

window.fetch = function (url, options = {}) {
    let headers = new Headers(options.headers);
    headers.set("X-Requested-With", "fetch");
    return originalFetch(url, { ...options, headers });
};
