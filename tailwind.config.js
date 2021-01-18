const colors = require('tailwindcss/colors')

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            typography: {
                DEFAULT: {
                    css:{
                        'ol li': {
                            '&:before': {
                              color: colors.warmGray[600],
                            },
                          },
                          'ul li': {
                            '&:before': {
                              color: colors.warmGray[600],
                            },
                          },
                          hr: {
                            borderColor: colors.warmGray[800],
                          },
                          thead: {
                            color: colors.warmGray[900],
                          },
                          pre: {
                            backgroundColor: colors.warmGray[800],
                          },
                          code: {
                            color: colors.warmGray[800],
                          },
                          blockquote: {
                            color: colors.warmGray[800],
                            borderLeftColor: colors.yellow[400],
                          },
                    }
                }
            },
            colors: {
                gray: colors.warmGray,
                yellow: colors.amber,
            },
            minHeight: {
                60: '15rem',
            },
            spacing: {
                hscreen: '50vh',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
