import axios, { AxiosRequestHeaders } from 'axios';

/**
 * Instance axios
 */
const $api = axios.create({
    baseURL: `${import.meta.env}`,
    timeout: 30000,
    timeoutErrorMessage: 'Error en la red',
    withCredentials: true,
});

/**
 * Setup request interceptors
 */
$api.interceptors.request.use((_request) => {
    /* Append content type header if its not present */
    if (!(_request.headers as AxiosRequestHeaders)['Content-Type']) {
        (_request.headers as AxiosRequestHeaders)['Content-Type'] =
            'application/json';
    }
    return _request;
});


export { $api };
