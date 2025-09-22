<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docslot</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/effect.css') ?>" />
</head>

<body>
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="#hero" class="cursor-pointer text-2xl font-bold text-dark-green tracking-wide bounce">DOCSLOT.</a>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#hero" class="text-dark-green hover:text-med-green font-medium transition-colors">ACCUEIL</a>
                    <a href="#services" class="text-dark-green hover:text-med-green font-medium transition-colors">SERVICES</a>
                    <a href="#testimonial" class="text-dark-green hover:text-med-green font-medium transition-colors">AVIS</a>
                    <a href="#features" class="text-dark-green hover:text-med-green font-medium transition-colors">FONCTIONNALITÉS</a>
                    <a href="#contact" class="text-dark-green hover:text-med-green font-medium transition-colors">CONTACT</a>
                </nav>
                <div>
                    <a href="<?= base_url('auth/signup') ?>" class="py-2 px-3 mx-1.5 text-dark-green hover:bg-dark-green hover:text-white transition-colors outline outline-2 rounded-md outline-dark-green scale-up">S'inscrire</a>
                    <a href="<?= base_url('auth/login') ?>" class="py-2.5 px-3 mx-1.5 hover:text-dark-green bg-dark-green text-white hover:bg-white hover:outline hover:outline-2 rounded-md hover:outline-dark-green scale-up">Se connecter</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="bg-white py-16 lg:py-20 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Restaurez la santé –<br />
                        <em class="text-dark-green relative">Favorisez votre bien-être</em>
                    </h2>
                    <div class="w-24 h-0.5 bg-gray-800 mb-6" style="background-image: repeating-linear-gradient(90deg, black, black 3px, transparent 3px, transparent 8px);"></div>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-md">
                        Avec DOCSLOT, réserver facilement vos consultations en ligne, gérer les créneaux horaires et bénéficiez d’un suivi efficace.
                        Nous plaçons la qualité des soins et le confort des patients au cœur de notre mission, afin de garantir un parcours de santé fluide et un bien-être durable.
                    </p>
                    <a href="<?= base_url('auth/login') ?>">
                        <button class="bg-gray-900 text-white px-8 py-3 rounded hover:bg-gray-800 transition-colors font-medium scale-up">
                            PRENEZ RENDEZ-VOUS →
                        </button>
                    </a>

                    <!-- Quality Guide Badge -->
                    <div class="mt-12 flex items-center space-x-3 fade-in">
                        <div class="w-8 h-8 bg-med-green rounded-full flex items-center justify-center bounce">
                            <span class="text-white text-sm">✓</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">QUALITÉ GARANTIE</p>
                            <p class="text-sm text-gray-600">Chaque rendez-vous est assuré par un professionnel de santé qualifié,<br> à l’écoute et soucieux du bien-être des patients.</p>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="flex space-x-4 mt-8">
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium scale-up">EXPERTISE</span>
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium scale-up">OPTIMISÉ</span>
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm font-medium scale-up">FIABILITÉ</span>
                    </div>
                </div>
                <div class="relative fade-in">
                    <img src="<?= base_url('img/Cabinet.jpeg') ?>" alt="cabinet" class="w-full h-[28rem] border-gray-300 rounded-2xl scale-up">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-gray-50 py-20 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 fade-in">
                    Là où la santé s’épanouit, et<br />
                    <em class="text-med-green relative">où le soin vous attend</em>
                </h3>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition scale-up fade-in">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-med-green/10 mb-6 bounce">
                        <span class="text-med-green text-3xl">🩺</span>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-3">Consultation</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Réservez votre rendez-vous en ligne et bénéficiez d’un suivi adapté auprès de professionnels de santé qualifiés.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition scale-up fade-in">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-med-green/10 mb-6 bounce">
                        <span class="text-med-green text-3xl">💊</span>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-3">Diagnostic & Traitement</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Un accompagnement médical fiable et personnalisé pour restaurer et préserver votre santé avec efficacité.
                    </p>
                </div>
                <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-sm hover:shadow-md transition scale-up fade-in">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full bg-med-green/10 mb-6 bounce">
                        <span class="text-med-green text-3xl">🏥</span>
                    </div>
                    <h4 class="font-semibold text-lg text-gray-900 mb-3">Expertise Médicale</h4>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Une équipe de professionnels expérimentés pour vous offrir des soins de qualité et un parcours de santé serein.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonial" class="bg-gray-50 py-20 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative fade-in">
                    <div class="w-full h-80 flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <img src="<?= base_url('img/smith.jpg') ?>" alt="" class="rounded-2xl scale-up">
                            <p class="text-gray-600 text-sm mt-2">Médecin Responsable</p>
                        </div>
                    </div>
                    <div class="absolute -bottom-3 -right-4 bg-white p-4 rounded-lg shadow-lg fade-in">
                        <p class="font-bold text-gray-900">DR. SMITH</p>
                        <p class="text-sm text-gray-600">Professionnel de Santé</p>
                    </div>
                </div>
                <div class="fade-in">
                    <blockquote class="text-xl ml-3 lg:text-2xl text-gray-900 mb-6 leading-relaxed border-l-4 border-med-green pl-6">
                        "Grâce à DOCSLOT, je peux me concentrer sur mes patients et mes soins, tandis que le secrétaire gère facilement les rendez-vous, les créneaux et l’organisation du planning. Cette application améliore la qualité des soins et rend le parcours patient plus fluide et efficace."
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-gray-50 py-16 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <div class="space-y-8 fade-in">
                    <div class="text-center">
                        <div class="w-16 h-16 border-2 border-gray-300 rounded-full bg-white flex items-center justify-center mx-auto mb-4 scale-up">
                            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A8 8 0 0112 15a8 8 0 016.879 2.804M12 12a5 5 0 100-10 5 5 0 000 10z" />
                            </svg>
                        </div>
                        <p class="font-bold text-gray-900">SARA K.</p>
                        <p class="text-sm text-gray-600">Patiente satisfaite</p>
                    </div>
                    <blockquote class="text-lg text-gray-900 border-l-4 border-med-green pl-4 fade-in">
                        "Grâce à DOCSLOT, j'ai pu réserver facilement mes rendez-vous, consulter mes créneaux disponibles et suivre l’historique de mes réservations. L’expérience est simple et fiable."
                    </blockquote>

                    <div class="grid grid-cols-2 gap-8 fade-in">
                        <div class="text-center scale-up">
                            <div class="w-12 h-12 bg-med-green rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white">✓</span>
                            </div>
                            <div class="text-3xl font-bold text-gray-900 mb-2">100%</div>
                            <h4 class="font-bold text-gray-900 mb-2">Rendez-vous Réservables</h4>
                            <p class="text-sm text-gray-600">Tous les créneaux disponibles peuvent être consultés et réservés facilement.</p>
                        </div>
                        <div class="text-center scale-up">
                            <div class="w-12 h-12 bg-med-green rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white">✓</span>
                            </div>
                            <div class="text-3xl font-bold text-gray-900 mb-2">Historique</div>
                            <h4 class="font-bold text-gray-900 mb-2">Consultation des Réservations</h4>
                            <p class="text-sm text-gray-600">Accédez à toutes vos réservations passées et à venir en un clic.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 fade-in">
                    <div class="bg-white rounded-2xl p-8 shadow-sm scale-up">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Vos outils santé</h3>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-med-green rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xs">1</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Créer un compte et se connecter</p>
                                    <p class="text-sm text-gray-600">Accès sécurisé à votre profil patient.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-med-green rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xs">2</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Consulter les créneaux disponibles</p>
                                    <p class="text-sm text-gray-600">Visualisez tous les rendez-vous disponibles et planifiez votre visite.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-med-green rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xs">3</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Réserver et annuler un rendez-vous</p>
                                    <p class="text-sm text-gray-600">Réservez rapidement et annulez selon les règles définies.</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-6 h-6 bg-med-green rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white text-xs">4</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Consulter l’historique des réservations</p>
                                    <p class="text-sm text-gray-600">Suivez tous vos rendez-vous passés et futurs.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white py-12 fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">

                <div>
                    <h4 class="font-bold mb-4 text-med-green">Vos outils santé</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>Réservation en ligne</li>
                        <li>Historique des rendez-vous</li>
                        <li>Consultation des créneaux</li>
                        <li>Annulation de rendez-vous</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-med-green">Navigation</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#hero" class="hover:text-med-green">Accueil</a></li>
                        <li><a href="<?= base_url('auth/signup') ?>" class="hover:text-med-green">Inscription</a></li>
                        <li><a href="<?= base_url('auth/login') ?>" class="hover:text-med-green">Connexion</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-med-green">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>contact@docslot.com</li>
                        <li>+261 34 12 345 67</li>
                        <li>Antananarivo, Madagascar</li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-gray-700 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-400 space-y-2 md:space-y-0">
                <p>© 2025 DOCSLOT. Tous droits réservés.</p>
                <p>Assistance et informations disponibles dans l’application</p>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('js/effect.js')?>"></script>
</body>

</html>