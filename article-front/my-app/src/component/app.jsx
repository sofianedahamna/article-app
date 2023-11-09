import React, { useEffect, useState } from 'react';

function Articles() {
    const [articles, setArticles] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        // The URL might need to be adjusted depending on the exact location of your PHP file.
        const url = "http://localhost:8080/index.php?controller=index&method=getArticle";

        fetch(url)
            .then(response => {
                // Always check that the response is OK (status code 200-299)
                console.log(response);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                setArticles(data);
            })
            .catch(error => {
                setError(error.toString());
            });
    }, []); // The empty array as a second argument ensures the effect runs only once

    if (error) {
        return <div>Error: {error}</div>;
    }

    // Optionally, you could show a loading indicator while the articles are being fetched
    if (!articles.length) {
        return <div>Loading...</div>;
    }

    return (
        <div>
            {articles.map((article, index) => (
                <div key={index}>
                    <h2>{article.title}</h2>
                    <p>{article.content}</p>
                </div>
            ))}
        </div>
    );
}

export default Articles;
