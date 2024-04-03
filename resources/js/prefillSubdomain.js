const company = document.querySelector('#company');
const subdomain = document.querySelector('#domain');

company.addEventListener('input', (e) => {
    const value = e.target.value.trim().replace(/\s+/g, '');
    subdomain.value = value.toLowerCase();
})