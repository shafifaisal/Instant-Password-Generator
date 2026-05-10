/**
 * iPassGenerator Dark Mode Theme Manager
 * Handles system preference detection, localStorage persistence,
 * and smooth dark mode toggling across all pages.
 */

(function () {
  const THEME_KEY = 'ipass-theme';
  const ARTICLE_CREATED_AT = {
    'ai-in-business-latest-trends-and-use-cases.html': Date.parse('2026-05-08T15:17:19.065Z'),
    'ai-in-education-latest-news-and-developments.html': Date.parse('2026-05-08T15:17:19.068Z'),
    'ai-productivity-hacks-to-save-hours-every-week.html': Date.parse('2026-05-08T15:17:19.070Z'),
    'best-free-ai-article-writers-2026.html': Date.parse('2026-05-08T15:19:51.104Z'),
    'best-free-ai-tools-you-should-try-in-2026-today.html': Date.parse('2026-05-08T15:17:19.072Z'),
    'best-free-apps-in-2026-antivirus-music-and-more.html': Date.parse('2026-05-09T07:31:55.094Z'),
    'challenges-and-limitations-of-ai.html': Date.parse('2026-05-08T15:17:19.076Z'),
    'create-free-tools-with-ai.html': Date.parse('2026-05-08T15:17:19.078Z'),
    'how-ai-automation-is-transforming-business-models-2026.html': Date.parse('2026-05-08T15:17:19.080Z'),
    'how-ai-is-changing-jobs-in-2026.html': Date.parse('2026-05-08T15:17:19.081Z'),
    'how-ai-is-impacting-digital-security-and-password-protection.html': Date.parse('2026-05-08T15:17:19.085Z'),
    'how-to-create-an-unhackable-password-in-3-seconds.html': Date.parse('2026-05-08T15:17:19.087Z'),
    'identity-theft-prevention-10-steps-to-protect-yourself-online.html': Date.parse('2026-05-09T15:25:17.546Z'),
    'role-of-ai-in-cybersecurity-today.html': Date.parse('2026-05-08T15:17:19.088Z'),
    'top-ai-tools-2026-replacing-human-work-fast.html': Date.parse('2026-05-08T15:17:19.090Z')
  };
  const SCRIPT_BASE_URL = document.currentScript && document.currentScript.src
    ? new URL('.', document.currentScript.src).href
    : new URL(window.location.pathname.indexOf('/article/') !== -1 ? '../' : './', window.location.href).href;

  function getInitialTheme() {
    try {
      const stored = localStorage.getItem(THEME_KEY);
      if (stored === 'dark' || stored === 'light') {
        return stored;
      }
    } catch (e) {
      // localStorage may be blocked in some contexts
    }
    // Default to system preference
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  }

  function applyTheme(theme, skipTransition) {
    const html = document.documentElement;
    if (theme === 'dark') {
      html.classList.add('dark');
    } else {
      html.classList.remove('dark');
    }

    // Update meta theme-color for mobile browsers
    const metaTheme = document.querySelector('meta[name="theme-color"]');
    if (metaTheme) {
      metaTheme.setAttribute('content', theme === 'dark' ? '#0f172a' : '#3568e7');
    }

    // Update toggle button icons if present
    const btn = document.getElementById('theme-toggle');
    if (btn) {
      const sun = btn.querySelector('.theme-icon-sun');
      const moon = btn.querySelector('.theme-icon-moon');
      if (sun && moon) {
        if (theme === 'dark') {
          sun.classList.remove('hidden');
          moon.classList.add('hidden');
        } else {
          sun.classList.add('hidden');
          moon.classList.remove('hidden');
        }
      }
      btn.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
    }
  }

  function saveTheme(theme) {
    try {
      localStorage.setItem(THEME_KEY, theme);
    } catch (e) {
      // ignore storage errors
    }
  }

  function toggleTheme() {
    const isDark = document.documentElement.classList.contains('dark');
    const next = isDark ? 'light' : 'dark';
    applyTheme(next);
    saveTheme(next);
  }

  function getArticleFilename(item) {
    const href = item.getAttribute('href');

    if (href) {
      try {
        const url = new URL(href, window.location.href);
        return decodeURIComponent(url.pathname.split('/').pop() || '');
      } catch (e) {
        const parts = href.split(/[?#]/)[0].split('/');
        return decodeURIComponent(parts.pop() || '');
      }
    }

    return decodeURIComponent(window.location.pathname.split('/').pop() || '');
  }

  function formatDateLabel(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][date.getMonth()];
    return day + ', ' + month;
  }

  function getArticleMetaFromItem(item, index, createdAtByFile) {
    const filename = getArticleFilename(item);
    const createdAt = createdAtByFile[filename] || 0;
    const createdDate = createdAt ? new Date(createdAt) : null;
    const title = item.dataset.relatedTitle || item.textContent.replace(/\s*\(\d{2},\s[A-Za-z]{3}\)\s*$/, '').trim();

    item.dataset.relatedTitle = title;

    return {
      item: item,
      filename: filename,
      title: title,
      index: index,
      createdAt: createdAt,
      year: createdDate ? String(createdDate.getFullYear()) : '',
      dateLabel: createdDate ? formatDateLabel(createdDate) : ''
    };
  }

  function getCurrentArticleFilename() {
    return decodeURIComponent(window.location.pathname.split('/').pop() || '');
  }

  function getArticleHref(filename) {
    return window.location.pathname.indexOf('/article/') !== -1 ? filename : 'article/' + filename;
  }

  function createYearHeading(year) {
    const heading = document.createElement('p');
    heading.className = 'pt-3 pl-2 pb-1 rounded bg-sky-900 text-xl font-semibold uppercase tracking-[0.25em] text-white-300 first:pt-0';
    heading.textContent = '' + year;
    heading.dataset.relatedYearHeading = 'true';
    return heading;
  }

  function renderGroupedRelatedArticles(list, articles) {
    const fragment = document.createDocumentFragment();
    let activeYear = '';

    articles.forEach(function (article) {
      if (article.year && article.year !== activeYear) {
        activeYear = article.year;
        fragment.appendChild(createYearHeading(activeYear));
      }

      article.item.textContent = article.title;
      fragment.appendChild(article.item);
    });

    list.replaceChildren(fragment);
  }

  function normalizeArticleResponse(articleData) {
    if (!Array.isArray(articleData)) {
      return null;
    }

    return articleData
      .filter(function (article) {
        return article && article.filename && article.title;
      })
      .map(function (article, index) {
        const createdDate = new Date(article.createdAt || 0);
        const filename = article.filename;
        const isCurrentArticle = filename === getCurrentArticleFilename();
        const item = document.createElement(isCurrentArticle ? 'span' : 'a');

        item.className = isCurrentArticle
          ? 'block text-slate-300'
          : 'block text-sky-400 transition hover:text-sky-300';

        if (!isCurrentArticle) {
          item.setAttribute('href', getArticleHref(filename));
        }

        return {
          item: item,
          filename: filename,
          title: article.title,
          index: index,
          createdAt: article.createdAt || 0,
          year: article.year || (article.createdAt ? String(createdDate.getFullYear()) : ''),
          dateLabel: article.dateLabel || (article.createdAt ? formatDateLabel(createdDate) : '')
        };
      });
  }

  function sortRelatedArticles(articleData) {
    const responseArticles = normalizeArticleResponse(articleData);
    const createdAtByFile = ARTICLE_CREATED_AT;
    const relatedLabels = Array.from(document.querySelectorAll('p')).filter(function (label) {
      return label.textContent.trim().toLowerCase() === 'related articles';
    });

    relatedLabels.forEach(function (label) {
      const wrapper = label.parentElement;
      if (!wrapper) {
        return;
      }

      const list = wrapper.querySelector('.space-y-1.text-base');
      if (!list) {
        return;
      }

      const articles = responseArticles || Array.from(list.children)
        .filter(function (item) {
          return item.dataset.relatedYearHeading !== 'true';
        })
        .map(function (item, index) {
          return getArticleMetaFromItem(item, index, createdAtByFile);
        });

      renderGroupedRelatedArticles(list, articles
        .sort(function (a, b) {
          return (b.createdAt - a.createdAt) || (a.index - b.index);
        }));
    });
  }

  function loadArticleCreationDates() {
    if (!window.fetch) {
      return;
    }

    fetch(new URL('article-created-at.php', SCRIPT_BASE_URL), {
      cache: 'no-store',
      credentials: 'same-origin'
    })
      .then(function (response) {
        return response.ok ? response.json() : null;
      })
      .then(function (articleCreatedAt) {
        if (Array.isArray(articleCreatedAt)) {
          sortRelatedArticles(articleCreatedAt);
        }
      })
      .catch(function () {
        // Static hosts cannot expose filesystem creation dates; keep the bundled fallback order.
      });
  }

  // Initialize immediately to prevent FOUC
  const initial = getInitialTheme();
  applyTheme(initial, true);

  // Wait for DOM to wire up toggle button
  function init() {
    sortRelatedArticles();
    loadArticleCreationDates();

    const btn = document.getElementById('theme-toggle');
    if (btn) {
      btn.addEventListener('click', toggleTheme);
    }

    // Listen for system preference changes when no explicit preference is stored
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
      try {
        if (!localStorage.getItem(THEME_KEY)) {
          applyTheme(e.matches ? 'dark' : 'light');
        }
      } catch (err) {
        // ignore
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

