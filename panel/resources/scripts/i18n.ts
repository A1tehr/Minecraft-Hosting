import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';
import I18NextHttpBackend, { BackendOptions } from 'i18next-http-backend';
import I18NextMultiloadBackendAdapter from 'i18next-multiload-backend-adapter';

// If we're using HMR use a unique hash per page reload so that we're always
// doing cache busting. Otherwise just use the builder provided hash value in
// the URL to allow cache busting to occur whenever the front-end is rebuilt.
const hash = module.hot ? Date.now().toString(16) : process.env.WEBPACK_BUILD_HASH;

// Detect user's language from localStorage, browser, or use 'en' as default
const getUserLanguage = () => {
    // Check if user has previously selected a language
    const savedLang = localStorage.getItem('i18nextLng');
    if (savedLang && ['en', 'ru'].includes(savedLang)) {
        return savedLang;
    }

    // Otherwise detect from browser
    const browserLang = navigator.language || (navigator as any).userLanguage;
    // Extract base language code (e.g., 'ru' from 'ru-RU')
    const langCode = browserLang.split('-')[0];
    // Support only 'en' and 'ru' for now
    const detectedLang = ['en', 'ru'].includes(langCode) ? langCode : 'en';
    
    // Save detected language to localStorage
    localStorage.setItem('i18nextLng', detectedLang);
    
    return detectedLang;
};

i18n.use(I18NextMultiloadBackendAdapter)
    .use(initReactI18next)
    .init({
        debug: true,
        lng: getUserLanguage(),
        fallbackLng: 'en',
        keySeparator: '.',
        ns: [
            'navigation',
            'dashboard/account',
            'dashboard/api',
            'dashboard/ssh',
            'dashboard/activity',
            'dashboard/index',
        ],
        defaultNS: 'navigation',
        backend: {
            backend: I18NextHttpBackend,
            backendOptions: {
                loadPath: '/locales/locale.json?locale={{lng}}&namespace={{ns}}',
                queryStringParams: { hash },
                allowMultiLoading: true,
            } as BackendOptions,
        } as Record<string, any>,
        interpolation: {
            // Per i18n-react documentation: this is not needed since React is already
            // handling escapes for us.
            escapeValue: false,
        },
        react: {
            useSuspense: false,
        },
    });

export default i18n;
