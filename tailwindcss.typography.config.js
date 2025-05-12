//--------------------------------------------------------------------------
// Tailwind Typography configuration
//--------------------------------------------------------------------------
//
// Here you may overwrite the default Tailwind Typography (or prosé) styles.
// Some defaults are provided.
// More info: https://github.com/tailwindlabs/tailwindcss-typography.
//
import typography from '@tailwindcss/typography';
import { isUsableColor } from '@tailwindcss/typography/src/utils';
// const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        maxWidth: '100ch',
                        figure: {
                            img: {
                                borderRadius: theme('borderRadius.md'),
                                boxShadow: theme('boxShadow.DEFAULT'),
                            },
                        },
                        a: {
                            fontWeight: '700',
                            textDecoration: 'none',
                            '&:hover': {
                                textDecoration: 'underline',
                            },
                        },
                        'h1, h2, h3, h4, h5, h6': {
                            fontWeight: '900',
                        },
                        // h1: {
                        //     fontSize: "var(--font-size-6xl)",
                        // },
                        // h2: {
                        //     fontSize: "var(--font-size-5xl)",
                        // },
                        // h3: {
                        //     fontSize: "var(--font-size-4xl)",
                        // },
                        // h4: {},
                    },
                },

                ...Object.entries(theme('colors')).reduce((reduced, [color, values]) => {
                    if (!isUsableColor(color, values)) {
                        return reduced;
                    }

                    return {
                        ...reduced,
                        [color]: {
                            css: [
                                {
                                    a: {
                                        color: values[600],
                                        '&:hover': {
                                            color: values[700],
                                        },
                                    },
                                    'a code': { color: values[600] },
                                },
                            ],
                        },
                    };
                }, {}),
            }),
        },
    },
    plugins: [typography],
};
