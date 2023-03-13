let citation = [
    "Des fois, tu parles à des gens. Tu crois que c'est les bons gens. En fait, c'est pas les bons gens.",
    "I never lose, either I win or I learn.",
    "Il n'y a rien de plus redoutable au monde que l'être humain qui s'ennuie.",
    "Certains lisent parce qu'ils sont trop paresseux pour réfléchir. Le chemin de l'ignorance est pavé de bonnes éditions.",
    "La vie est ainsi faite que ce qui arrive ne ressemble jamais à ce qu'on en attendait.",
    "Je ne suis pas ce qui m'arrive. Je suis ce que je choisi de devenir.",
    "L'alcool tue lentement : on s'en fout, on n'est pas pressés.",
    "Archimède fut le premier à démontrer que lorsqu'on plonge un corps dans une baignoire, le téléphone sonne.",
    "L'innovation c'est ce qui distingue un leader d'un suiveur.",
    "Un homme déshonoré est pire qu'un homme mort.",
    "L'essence de la justice est de ne nuire à personne, et de veiller à l'utilité publique.",
    "Le roman est devenu une enquête générale sur l'homme et sur le monde.",
    "Si le propre de la vie est d'adapter l'individu à son milieu, le propre de la volonté est de l'en soustraire.",
    "Il faut extirper la bêtise parce qu’elle rend bête ceux qui la rencontrent.",
    "La gratitude, c'est le Paradis lui-même."
]

function getQuote(){
    var randomNumber = Math.floor(Math.random()* citation.length);
    document.getElementById('newCitationSection').innerHTML = citation[randomNumber];
}