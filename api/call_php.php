const axios = require('axios');

app.post('/call_php', (req, res) => {
    axios.get('http://localhost/your_php_project/api/php_api.php')
        .then(response => {
            res.send(response.data);
        })
        .catch(error => {
            res.status(500).send(error);
        });
});
