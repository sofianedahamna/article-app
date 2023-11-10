import React, { useEffect, useState } from 'react';

function Articles() {
    const [articles, setArticles] = useState([]);
    const [error, setError] = useState(null);
    const [libelle, setLibelle] = useState('');
    const [prix, setPrix] = useState('');

    // Fonction pour charger les articles depuis le serveur
    const loadArticles = () => {
        fetch("http://localhost:8080/index.php?controller=index&method=getArticle")
            .then(response => {
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
    };

    // Utiliser useEffect pour charger les articles au montage du composant
    useEffect(() => {
        loadArticles();
    }, []);

    const handleSubmit = (e) => {
        e.preventDefault();

        const formData = new FormData();
        formData.append('libelle', libelle);
        formData.append('prix', prix);

        fetch("http://localhost:8080/index.php?controller=index&method=AddArticle", {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            // Réinitialiser le formulaire
            setLibelle('');
            setPrix('');
            // Recharger les articles après l'ajout
            loadArticles();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    const handleLibelleChange = (e) => {
        setLibelle(e.target.value);
    };

    const handlePrixChange = (e) => {
        setPrix(e.target.value);
    };

    if (error) {
        return <div>Error: {error}</div>;
    }

    if (!articles.length) {
        return <div>Loading...</div>;
    }

    return (
        <div className='container'>
            <main className='main justify-content-center'>
                <div>
                    {articles.map((article, index) => (
                        <div key={index}>
                            <br/>
                            <h2>{article.libelle}</h2>
                            <p>{article.prix}€</p>
                        </div>
                    ))}
                    <h2>Ajouter un article</h2>
                    <form onSubmit={handleSubmit}>
                        <label htmlFor="libelle">libelle</label>
                        <input type="text" name='libelle' value={libelle} onChange={handleLibelleChange} className="form-control  w-25" />
                        <label htmlFor="prix">prix</label>
                        <input type="text" name='prix' value={prix} onChange={handlePrixChange} className="form-control w-25" />
                        <input type="submit" value="Ajouter" className="btn tex-center bg-info mt-2" />
                    </form>
                </div>
            </main>
        </div>
    );
}

export default Articles;
