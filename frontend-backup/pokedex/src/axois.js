// src/axios.js
import axios from 'axios';

const instance = axios.create({
    baseURL: 'http://localhost:9000/api', // Your Laravel backend URL
    timeout: 1000,
    headers: {'X-Custom-Header': 'foobar'}
});

export default instance;
