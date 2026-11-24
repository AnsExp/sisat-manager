/*
 * SISAT – prototipos estáticos (sin acceso a datos).
 * Todos los valores son de ejemplo, generados con una semilla fija por ítem para que
 * el dashboard y cada prototipo muestren los mismos números.
 */
(function () {
    'use strict';

    const S = window.SISAT;
    const CATS = ['I', 'II', 'III', 'IV', 'V'];
    const MONTHS = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
    const NOW_MONTH = 10; // noviembre 2026 (fecha de referencia del prototipo)
    const YEAR = 2026;
    const COMPANY = { name: 'Industrias Metálicas del Pacífico S.A.', ruc: '0991234567001', ciiu: 'C2511.01 · Riesgo alto', workers: 74 };

    const PEOPLE = [
        ['María Fernanda', 'Guamán Lema', 'Operaria de producción', 'Producción'],
        ['Carlos Andrés', 'Pérez Villacís', 'Soldador', 'Producción'],
        ['Luis Alberto', 'Quishpe Toapanta', 'Montacarguista', 'Bodega'],
        ['Ana Lucía', 'Mendoza Cedeño', 'Asistente administrativa', 'Administración'],
        ['Jorge Enrique', 'Salazar Ruiz', 'Mecánico de mantenimiento', 'Mantenimiento'],
        ['Diana Carolina', 'Paredes Molina', 'Supervisora de planta', 'Producción'],
        ['Wilson Fabián', 'Chávez Andrade', 'Chofer', 'Logística'],
        ['Gabriela Estefanía', 'Torres León', 'Analista de calidad', 'Calidad'],
        ['Segundo Manuel', 'Yépez Caiza', 'Bodeguero', 'Bodega'],
        ['Paola Alexandra', 'Vera Macías', 'Operaria de producción', 'Producción'],
        ['Héctor Iván', 'Morales Pazmiño', 'Soldador', 'Producción'],
        ['Rosa Elena', 'Cando Tipán', 'Auxiliar de limpieza', 'Servicios generales'],
        ['Kevin Steven', 'Zambrano Loor', 'Operario de corte', 'Producción'],
        ['Verónica Isabel', 'Ortiz Castro', 'Jefa de talento humano', 'Administración'],
    ];

    // ───────────── utilidades ─────────────
    const $ = (sel, el) => (el || document).querySelector(sel);
    const $$ = (sel, el) => Array.from((el || document).querySelectorAll(sel));
    const esc = (s) => String(s == null ? '' : s).replace(/[&<>"']/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
    const pct = (x) => (x == null || isNaN(x) ? '—' : `${Math.round(x * 100)} %`);
    const initials = (p) => (p[0][0] + p[1][0]).toUpperCase();

    function seedOf(str) {
        let h = 2166136261;
        for (let i = 0; i < str.length; i++) { h ^= str.charCodeAt(i); h = Math.imul(h, 16777619); }
        return h >>> 0;
    }
    function rngFor(str) {
        let a = seedOf(str);
        return function () {
            a |= 0; a = (a + 0x6d2b79f5) | 0;
            let t = Math.imul(a ^ (a >>> 15), 1 | a);
            t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
            return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
        };
    }
    const pick = (rng, arr) => arr[Math.floor(rng() * arr.length)];
    const between = (rng, a, b) => a + Math.floor(rng() * (b - a + 1));
    const date = (rng, m0, m1) => { const m = between(rng, m0, m1); return `${String(between(rng, 1, 28)).padStart(2, '0')}/${String(m + 1).padStart(2, '0')}/${YEAR}`; };

    function toneFor(ratio) { return ratio == null ? '' : ratio >= 0.9 ? 'ok' : ratio >= 0.6 ? 'warn' : 'bad'; }
    function stateLabel(ratio) { return ratio == null ? 'Sin datos' : ratio >= 0.9 ? 'Cumple' : ratio >= 0.6 ? 'Parcial' : 'No cumple'; }

    function getCategory() {
        const q = new URLSearchParams(location.search).get('cat');
        if (q && CATS.includes(q)) { try { localStorage.setItem('sisat-cat', q); } catch (e) { /* sin almacenamiento */ } return q; }
        try { const s = localStorage.getItem('sisat-cat'); if (CATS.includes(s)) return s; } catch (e) { /* sin almacenamiento */ }
        return 'III';
    }

    // ───────────── modelos por patrón (puros, sin DOM) ─────────────
    const MODELS = {
        workers: {
            init(item, rng) {
                const c = item.config;
                const n = c.population ? between(rng, 5, 8) : 12;
                const states = c.states;
                return PEOPLE.slice(0, 14).sort(() => rng() - 0.5).slice(0, n).map((p) => {
                    const r = rng();
                    const st = r < 0.72 ? 0 : r < 0.9 ? Math.min(1, states.length - 1) : states.length - 1;
                    return {
                        p, state: st,
                        cols: (c.cols || []).map((col) => (col.type === 'date' ? date(rng, 0, NOW_MONTH) : pick(rng, col.options))),
                        id: `17${between(rng, 10000000, 99999999)}`,
                    };
                });
            },
            metric: (rows) => ({ num: rows.filter((r) => r.state === 0).length, den: rows.length }),
        },
        matrix: {
            init(item, rng) {
                return item.config.rows.map((label) => ({ label, cells: item.config.cols.map(() => rng() < 0.82) }));
            },
            metric: (rows) => ({ num: rows.filter((r) => r.cells.every(Boolean)).length, den: rows.length }),
        },
        schedule: {
            init(item, rng) {
                const every = item.config.every || 1;
                return item.config.rows.map((label, i) => ({
                    label,
                    months: MONTHS.map((_, m) => {
                        if ((m + i) % every !== 0) return 'none';
                        if (m > NOW_MONTH) return 'future';
                        return rng() < 0.86 ? 'done' : 'late';
                    }),
                }));
            },
            metric(rows) {
                let num = 0, den = 0;
                rows.forEach((r) => r.months.forEach((s) => { if (s === 'done') { num++; den++; } else if (s === 'late') den++; }));
                return { num, den };
            },
        },
        cases: {
            init(item, rng) {
                const c = item.config;
                const n = between(rng, 6, 9);
                const last = c.stages.length - 1;
                return Array.from({ length: n }, (_, i) => {
                    const r = rng();
                    const stage = r < 0.62 ? last : between(rng, 0, Math.max(0, last - 1));
                    const p = pick(rng, PEOPLE);
                    return { code: `${c.caseLabel.slice(0, 2).toUpperCase()}-${YEAR}-${String(i + 1).padStart(3, '0')}`, type: pick(rng, c.types), person: p, opened: date(rng, 0, NOW_MONTH), stage, overdue: stage < last && rng() < 0.45 };
                });
            },
            metric: (rows, item) => ({ num: rows.filter((r) => r.stage === item.config.stages.length - 1).length, den: rows.length }),
        },
        program: {
            init(item, rng) {
                return item.config.activities.map((name, i) => {
                    const month = Math.min(11, Math.round((i * 11) / Math.max(1, item.config.activities.length - 1)) + (rng() < 0.3 ? 1 : 0));
                    const past = month <= NOW_MONTH;
                    const done = past && rng() < 0.82;
                    const den = between(rng, 12, 70);
                    return { name, month, state: done ? 'done' : past ? 'late' : 'planned', den, num: done ? Math.round(den * (0.62 + rng() * 0.38)) : 0, files: done ? between(rng, 1, 4) : 0 };
                });
            },
            metric(rows) { const due = rows.filter((r) => r.state !== 'planned'); return { num: due.filter((r) => r.state === 'done').length, den: due.length }; },
        },
        report: {
            init(item, rng) {
                const periods = item.config.periods;
                return periods.map((label, i) => {
                    const isLast = i === periods.length - 1;
                    const state = !isLast ? (rng() < 0.85 ? 'done' : 'late') : 'progress';
                    return { label, state, sections: item.config.sections.map(() => (state === 'done' ? true : rng() < 0.5)) };
                });
            },
            metric(rows) { const due = rows.filter((r) => r.state !== 'progress'); return { num: due.filter((r) => r.state === 'done').length, den: due.length }; },
        },
        controls: {
            init(item, rng) {
                return item.config.risks.map((r) => {
                    const x = rng();
                    return Object.assign({}, r, { state: x < 0.6 ? 'Implementada' : x < 0.85 ? 'En curso' : 'Vencida', due: date(rng, 0, 11), owner: pick(rng, PEOPLE) });
                });
            },
            metric: (rows) => ({ num: rows.filter((r) => r.state === 'Implementada').length, den: rows.filter((r) => r.state !== 'En curso').length || rows.length }),
        },
        document: {
            init(item, rng) {
                const checks = item.config.checklist.map(() => rng() < 0.75);
                return { checks, stage: checks.every(Boolean) ? 3 : between(rng, 0, 2) };
            },
            metric: (st) => ({ num: st.checks.filter(Boolean).length, den: st.checks.length }),
        },
    };

    // Estado inicial de un ítem: modelo del patrón + valores de ejemplo para los demás indicadores.
    function buildState(item) {
        const rng = rngFor(item.id);
        const model = MODELS[item.pattern];
        const data = model.init(item, rng);
        const checklist = item.config.checklist && item.pattern !== 'document' ? item.config.checklist.map(() => rng() < 0.75) : null;
        const extra = item.indicators.map((d, i) => {
            if (i === 0) return null;
            const den = between(rng, 4, 40);
            return { num: Math.min(den, Math.round(den * (0.55 + rng() * 0.5))), den };
        });
        return { data, checklist, extra };
    }

    function indicatorValues(item, state) {
        const model = MODELS[item.pattern];
        return item.indicators.map((d, i) => {
            let v, live = false;
            if (i === 0) { v = model.metric(state.data, item); live = true; }
            else if (state.checklist && /exigidos \(\d+\)/.test(d.den)) { v = { num: state.checklist.filter(Boolean).length, den: state.checklist.length }; live = true; }
            else v = state.extra[i];
            const value = v.den > 0 ? v.num / v.den : null;
            const score = value == null ? null : Math.min(value / (d.meta / 100), 1);
            return { def: d, num: v.num, den: v.den, value, score, live };
        });
    }

    function itemScore(values) {
        let w = 0, s = 0;
        values.forEach((v) => { if (v.score != null) { w += v.def.weight; s += v.score * v.def.weight; } });
        return w ? s / w : null;
    }

    // ───────────── componentes visuales ─────────────
    function gauge(ratio, label, small) {
        const p = ratio == null ? 0 : Math.round(ratio * 100);
        const color = ratio == null ? 'var(--border-strong)' : `var(--${toneFor(ratio)})`;
        return `<div class="gauge${small ? ' sm' : ''}" style="--p:${p};--c:${color}"><div><div><strong>${ratio == null ? '—' : p + '%'}</strong>${small ? '' : `<small>${esc(label || 'cumplimiento')}</small>`}</div></div></div>`;
    }
    function bar(ratio, target) {
        const t = toneFor(ratio);
        return `<div class="bar ${t}"><i style="width:${ratio == null ? 0 : Math.min(100, ratio * 100)}%"></i>${target != null ? `<span class="target" style="left:${target}%"></span>` : ''}</div>`;
    }
    function badge(text, tone) { return `<span class="badge ${tone || ''}">${esc(text)}</span>`; }
    function catsHtml(item, mine) {
        return `<span class="cats">${CATS.map((c) => `<span class="cat ${item.categories.includes(c) ? 'on' : ''} ${c === mine && item.categories.includes(c) ? 'mine' : ''}" title="Categoría ${c}">${c}</span>`).join('')}</span>`;
    }

    let toastTimer;
    function toast(msg) {
        let t = $('.toast');
        if (!t) { t = document.createElement('div'); t.className = 'toast'; document.body.appendChild(t); }
        t.textContent = msg; t.classList.add('show');
        clearTimeout(toastTimer); toastTimer = setTimeout(() => t.classList.remove('show'), 2200);
    }

    function modal(title, body, onSave, saveLabel) {
        const bg = document.createElement('div');
        bg.className = 'modal-bg open';
        bg.innerHTML = `<div class="modal" role="dialog" aria-modal="true" aria-label="${esc(title)}">
            <div class="card-h"><h2>${esc(title)}</h2><div class="actions"><button class="btn ghost sm" data-x aria-label="Cerrar">✕</button></div></div>
            <div class="card-b">${body}</div>
            <div class="modal-f"><button class="btn" data-x>Cancelar</button><button class="btn primary" data-save>${esc(saveLabel || 'Guardar')}</button></div></div>`;
        document.body.appendChild(bg);
        const close = () => bg.remove();
        $$('[data-x]', bg).forEach((b) => b.addEventListener('click', close));
        bg.addEventListener('click', (e) => { if (e.target === bg) close(); });
        $('[data-save]', bg).addEventListener('click', () => { if (onSave) onSave(bg); close(); });
        const first = $('input, select, textarea', bg); if (first) first.focus();
    }
    const field = (label, input) => `<label class="field">${esc(label)}${input}</label>`;
    const dropzone = '<div class="dropzone">Arrastre aquí la evidencia (PDF, imagen) o <u>seleccione un archivo</u><br><small>Prototipo: no se sube ningún archivo</small></div>';

    // ───────────── espacios de trabajo por patrón ─────────────
    const VIEWS = {};

    VIEWS.workers = function (item, ctx) {
        const c = item.config;
        let filter = 'all', query = '';
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const counts = c.states.map((_, i) => rows.filter((r) => r.state === i).length);
            const visible = rows.filter((r) => (filter === 'all' || r.state === filter) && (`${r.p[0]} ${r.p[1]} ${r.p[2]}`.toLowerCase().includes(query)));
            card.innerHTML = `
                <div class="card-h"><h2>${esc(c.population || 'Nómina de trabajadores')}</h2><span class="sub">${rows.length} registros</span>
                    <div class="actions"><button class="btn sm" data-export>Exportar</button><button class="btn primary sm" data-new>+ ${esc(c.action)}</button></div></div>
                <div class="card-b" style="display:grid;gap:10px">
                    ${c.confidential ? '<div class="notice">🔒 Información confidencial: solo la ven los profesionales de la salud del SISAT (Arts. 44 y 45). Fuera del SISAT solo circula el certificado de salud en el trabajo.</div>' : ''}
                    <div style="display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                        <div class="chips"><button class="chip ${filter === 'all' ? 'on' : ''}" data-f="all">Todos · ${rows.length}</button>
                        ${c.states.map((s, i) => `<button class="chip ${filter === i ? 'on' : ''}" data-f="${i}">${esc(s.label)} · ${counts[i]}</button>`).join('')}</div>
                        <input type="search" placeholder="Buscar trabajador o puesto" style="max-width:240px;margin-left:auto" value="${esc(query)}" data-q>
                    </div>
                </div>
                <div class="table-wrap"><table>
                    <thead><tr><th>Trabajador</th><th>Puesto / área</th>${(c.cols || []).map((col) => `<th>${esc(col.label)}</th>`).join('')}<th>Estado</th><th></th></tr></thead>
                    <tbody>${visible.map((r) => {
                        const st = c.states[r.state];
                        return `<tr><td><div class="person"><span class="avatar">${initials(r.p)}</span><div>${esc(r.p[0] + ' ' + r.p[1])}<div class="small muted">CI ${r.id.slice(0, 6)}••••</div></div></div></td>
                            <td>${esc(r.p[2])}<div class="small muted">${esc(r.p[3])}</div></td>
                            ${r.cols.map((v) => `<td>${esc(v)}</td>`).join('')}
                            <td>${badge(st.label, st.tone)}</td>
                            <td class="center"><button class="btn sm" data-act="${rows.indexOf(r)}">${r.state === 0 ? 'Ver' : 'Registrar'}</button></td></tr>`;
                    }).join('') || `<tr><td colspan="9" class="muted center">Sin resultados</td></tr>`}</tbody></table></div>`;
            $$('[data-f]', card).forEach((b) => b.addEventListener('click', () => { filter = b.dataset.f === 'all' ? 'all' : Number(b.dataset.f); draw(); }));
            $('[data-q]', card).addEventListener('input', (e) => { query = e.target.value.toLowerCase(); const pos = e.target.selectionStart; draw(); const q = $('[data-q]', card); q.focus(); q.setSelectionRange(pos, pos); });
            $('[data-export]', card).addEventListener('click', () => toast('Prototipo: exportaría la tabla a Excel'));
            $('[data-new]', card).addEventListener('click', () => openForm(null));
            $$('[data-act]', card).forEach((b) => b.addEventListener('click', () => openForm(Number(b.dataset.act))));
        }
        function openForm(idx) {
            const rows = ctx.state.data;
            const r = idx == null ? null : rows[idx];
            modal(c.action, `
                ${field('Trabajador', r ? `<input type="text" value="${esc(r.p[0] + ' ' + r.p[1])}" readonly>` : `<select>${PEOPLE.map((p) => `<option>${esc(p[0] + ' ' + p[1])}</option>`).join('')}</select>`)}
                ${field('Fecha', `<input type="date" value="${YEAR}-11-24">`)}
                ${(c.cols || []).filter((col) => col.options).map((col) => field(col.label, `<select>${[...new Set(col.options)].map((o) => `<option>${esc(o)}</option>`).join('')}</select>`)).join('')}
                ${field('Resultado', `<select data-res>${c.states.map((s, i) => `<option value="${i}">${esc(s.label)}</option>`).join('')}</select>`)}
                ${field('Observaciones', '<textarea rows="2" placeholder="Opcional"></textarea>')}
                ${dropzone}`, (bg) => {
                const st = Number($('[data-res]', bg).value);
                if (r) r.state = st; else rows.unshift({ p: PEOPLE[0], state: st, cols: (c.cols || []).map((col) => (col.options ? col.options[0] : `24/11/${YEAR}`)), id: '1712345678' });
                draw(); ctx.refresh(); toast('Registro guardado (prototipo)');
            });
        }
        draw();
        return card;
    };

    VIEWS.matrix = function (item, ctx) {
        const c = item.config;
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const done = rows.filter((r) => r.cells.every(Boolean)).length;
            card.innerHTML = `
                <div class="card-h"><h2>Matriz de verificación</h2><span class="sub">${done} de ${rows.length} completos · clic en una celda para marcarla</span>
                    <div class="actions"><button class="btn primary sm" data-add>+ Agregar ${esc((c.rowLabel || 'fila').toLowerCase())}</button></div></div>
                <div class="table-wrap"><table>
                    <thead><tr><th>${esc(c.rowLabel || 'Elemento')}</th>${c.cols.map((h) => `<th class="center">${esc(h)}</th>`).join('')}<th class="center">Estado</th><th></th></tr></thead>
                    <tbody>${rows.map((r, i) => {
                        const ok = r.cells.every(Boolean);
                        return `<tr><td><b style="font-weight:550">${esc(r.label)}</b></td>
                            ${r.cells.map((v, j) => `<td class="center"><button class="cell-toggle ${v ? 'on' : ''}" data-cell="${i}:${j}" aria-label="${esc(c.cols[j])}" aria-pressed="${v}"></button></td>`).join('')}
                            <td class="center">${ok ? badge('Completo', 'ok') : badge(`${r.cells.filter(Boolean).length}/${r.cells.length}`, 'warn')}</td>
                            <td class="center"><button class="btn sm ghost" data-ev="${i}" title="Adjuntar evidencia">📎</button></td></tr>`;
                    }).join('')}</tbody></table></div>`;
            $$('[data-cell]', card).forEach((b) => b.addEventListener('click', () => {
                const [i, j] = b.dataset.cell.split(':').map(Number);
                rows[i].cells[j] = !rows[i].cells[j]; draw(); ctx.refresh();
            }));
            $('[data-add]', card).addEventListener('click', () => modal(`Agregar ${c.rowLabel || 'fila'}`, `${field(c.rowLabel || 'Nombre', '<input type="text" data-name placeholder="Nombre">')}`, (bg) => {
                rows.push({ label: $('[data-name]', bg).value || `Nuevo ${(c.rowLabel || 'elemento').toLowerCase()}`, cells: c.cols.map(() => false) }); draw(); ctx.refresh();
            }, 'Agregar'));
            $$('[data-ev]', card).forEach((b) => b.addEventListener('click', () => modal(`Evidencia · ${rows[Number(b.dataset.ev)].label}`, `${field('Tipo de documento', `<select>${c.cols.map((h) => `<option>${esc(h)}</option>`).join('')}</select>`)}${field('Fecha del documento', `<input type="date" value="${YEAR}-11-24">`)}${dropzone}`, () => toast('Evidencia adjuntada (prototipo)'), 'Adjuntar')));
        }
        draw();
        return card;
    };

    VIEWS.schedule = function (item, ctx) {
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const m = MODELS.schedule.metric(rows);
            card.innerHTML = `
                <div class="card-h"><h2>Cronograma ${YEAR}</h2><span class="sub">${m.num} de ${m.den} ejecutadas a la fecha · clic en un mes pasado para registrar</span>
                    <div class="actions"><span class="legend"><span>${badge('Ejecutada', 'ok')}</span><span>${badge('Atrasada', 'bad')}</span><span>${badge('Programada')}</span></span></div></div>
                <div class="table-wrap"><table class="sched">
                    <thead><tr><th>Elemento</th>${MONTHS.map((mo, i) => `<th class="center ${i === NOW_MONTH ? 'now' : ''}">${mo}</th>`).join('')}</tr></thead>
                    <tbody>${rows.map((r, i) => `<tr><td style="min-width:200px"><b style="font-weight:550">${esc(r.label)}</b></td>${r.months.map((s, j) => `<td class="center"><button class="m ${s}" data-m="${i}:${j}" title="${MONTHS[j]} – ${s === 'done' ? 'ejecutada' : s === 'late' ? 'atrasada' : 'programada'}" ${s === 'future' || s === 'none' ? 'disabled' : ''}>${s === 'future' ? '·' : ''}</button></td>`).join('')}</tr>`).join('')}</tbody>
                </table></div>`;
            $$('[data-m]', card).forEach((b) => b.addEventListener('click', () => {
                const [i, j] = b.dataset.m.split(':').map(Number);
                const r = rows[i];
                if (r.months[j] === 'done') { r.months[j] = 'late'; draw(); ctx.refresh(); return; }
                modal(`Registrar · ${r.label} · ${MONTHS[j]}`, `${field('Fecha de ejecución', `<input type="date" value="${YEAR}-${String(j + 1).padStart(2, '0')}-15">`)}${field('Resultado', '<select><option>Conforme</option><option>Con no conformidades</option></select>')}${field('No conformidades detectadas', '<textarea rows="2" placeholder="Describa hallazgo, responsable y plazo"></textarea>')}${dropzone}`, () => { r.months[j] = 'done'; draw(); ctx.refresh(); toast('Inspección registrada (prototipo)'); }, 'Registrar');
            }));
        }
        draw();
        return card;
    };

    VIEWS.cases = function (item, ctx) {
        const c = item.config;
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const last = c.stages.length - 1;
            card.innerHTML = `
                <div class="card-h"><h2>Seguimiento de ${esc(c.caseLabel.toLowerCase())}s</h2><span class="sub">${rows.filter((r) => r.stage === last).length} de ${rows.length} cerrados</span>
                    <div class="actions"><button class="btn primary sm" data-new>+ Nuevo ${esc(c.caseLabel.toLowerCase())}</button></div></div>
                <div class="kanban">${c.stages.map((stage, si) => {
                    const inLane = rows.filter((r) => r.stage === si);
                    return `<div class="lane"><div class="lane-h"><span>${esc(stage)}</span><span>${inLane.length}</span></div>
                        ${inLane.map((r) => `<div class="case">
                            <div class="case-top"><span>${esc(r.code)}</span><span>${esc(r.opened)}</span></div>
                            <div class="case-title">${esc(r.type)}</div>
                            <div class="small muted">${esc(r.person[0].split(' ')[0] + ' ' + r.person[1].split(' ')[0])} · ${esc(r.person[2])}</div>
                            <div class="case-foot">${si === last ? badge('Cerrado', 'ok') : r.overdue ? badge('Fuera de plazo', 'bad') : badge('En plazo', 'warn')}
                            ${si < last ? `<button class="btn sm" data-adv="${rows.indexOf(r)}">${esc(c.stages[si + 1])} →</button>` : ''}</div></div>`).join('') || '<div class="small muted" style="padding:4px">Sin registros</div>'}
                    </div>`;
                }).join('')}</div>`;
            $$('[data-adv]', card).forEach((b) => b.addEventListener('click', () => {
                const r = rows[Number(b.dataset.adv)];
                modal(`${r.code} → ${c.stages[r.stage + 1]}`, `${field('Fecha', `<input type="date" value="${YEAR}-11-24">`)}${field('Detalle', '<textarea rows="3" placeholder="Qué se hizo en esta etapa"></textarea>')}${dropzone}`, () => { r.stage++; r.overdue = false; draw(); ctx.refresh(); toast('Etapa actualizada (prototipo)'); }, 'Confirmar');
            }));
            $('[data-new]', card).addEventListener('click', () => modal(`Nuevo ${c.caseLabel.toLowerCase()}`, `${field('Tipo', `<select data-t>${c.types.map((t) => `<option>${esc(t)}</option>`).join('')}</select>`)}${field('Trabajador', `<select>${PEOPLE.map((p) => `<option>${esc(p[0] + ' ' + p[1])}</option>`).join('')}</select>`)}${field('Fecha', `<input type="date" value="${YEAR}-11-24">`)}${field('Descripción', '<textarea rows="3"></textarea>')}`, (bg) => {
                rows.push({ code: `${c.caseLabel.slice(0, 2).toUpperCase()}-${YEAR}-${String(rows.length + 1).padStart(3, '0')}`, type: $('[data-t]', bg).value, person: PEOPLE[0], opened: `24/11/${YEAR}`, stage: 0, overdue: false });
                draw(); ctx.refresh(); toast('Registro creado (prototipo)');
            }, 'Crear'));
        }
        draw();
        return card;
    };

    VIEWS.program = function (item, ctx) {
        const c = item.config;
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const tot = rows.reduce((a, r) => ({ num: a.num + r.num, den: a.den + (r.state === 'done' ? r.den : 0) }), { num: 0, den: 0 });
            card.innerHTML = `
                <div class="card-h"><h2>Programa ${YEAR}</h2><span class="sub">${rows.filter((r) => r.state === 'done').length} ejecutadas · participación acumulada ${pct(tot.den ? tot.num / tot.den : null)}</span>
                    <div class="actions"><button class="btn primary sm" data-new>+ Programar actividad</button></div></div>
                <div class="table-wrap"><table>
                    <thead><tr><th>Actividad</th><th>Mes</th><th>Estado</th><th style="width:200px">${esc(c.participationLabel || 'Participación')}</th><th class="center">Evidencias</th><th></th></tr></thead>
                    <tbody>${rows.map((r, i) => {
                        const ratio = r.den ? r.num / r.den : null;
                        return `<tr><td><b style="font-weight:550">${esc(r.name)}</b></td><td>${MONTHS[r.month]}</td>
                            <td>${r.state === 'done' ? badge('Ejecutada', 'ok') : r.state === 'late' ? badge('Atrasada', 'bad') : badge('Programada')}</td>
                            <td>${r.state === 'done' ? `<div style="display:grid;gap:4px"><span class="small">${r.num} / ${r.den} · ${pct(ratio)}</span>${bar(ratio)}</div>` : '<span class="muted small">—</span>'}</td>
                            <td class="center">${r.files ? `📎 ${r.files}` : '<span class="muted">—</span>'}</td>
                            <td class="center">${r.state !== 'done' ? `<button class="btn sm" data-run="${i}">Registrar ejecución</button>` : '<button class="btn sm ghost" disabled>Ver</button>'}</td></tr>`;
                    }).join('')}</tbody></table></div>`;
            $$('[data-run]', card).forEach((b) => b.addEventListener('click', () => {
                const r = rows[Number(b.dataset.run)];
                modal(`Ejecución · ${r.name}`, `${field('Fecha de ejecución', `<input type="date" value="${YEAR}-11-24">`)}<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">${field('Participantes', `<input type="number" data-n value="${Math.round(r.den * 0.85)}">`)}${field('Convocados', `<input type="number" data-d value="${r.den}">`)}</div>${dropzone}`, (bg) => {
                    r.state = 'done'; r.num = Number($('[data-n]', bg).value) || 0; r.den = Number($('[data-d]', bg).value) || 1; r.files = 1; draw(); ctx.refresh(); toast('Ejecución registrada (prototipo)');
                }, 'Registrar');
            }));
            $('[data-new]', card).addEventListener('click', () => modal('Programar actividad', `${field('Actividad', '<input type="text" data-a placeholder="Nombre de la actividad">')}${field('Mes', `<select data-m>${MONTHS.map((m, i) => `<option value="${i}" ${i === 11 ? 'selected' : ''}>${m}</option>`).join('')}</select>`)}${field('Convocados', '<input type="number" data-d value="30">')}`, (bg) => {
                const month = Number($('[data-m]', bg).value);
                rows.push({ name: $('[data-a]', bg).value || 'Nueva actividad', month, state: month <= NOW_MONTH ? 'late' : 'planned', den: Number($('[data-d]', bg).value) || 30, num: 0, files: 0 });
                draw(); ctx.refresh();
            }, 'Programar'));
        }
        draw();
        return card;
    };

    VIEWS.report = function (item, ctx) {
        const c = item.config;
        let sel = ctx.state.data.length - 1;
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const r = rows[sel];
            const done = r.sections.filter(Boolean).length;
            card.innerHTML = `
                <div class="card-h"><h2>Informes</h2><span class="sub">Seleccione un período para ver su contenido</span></div>
                <div style="display:grid;grid-template-columns:minmax(180px,1fr) 2fr">
                    <div style="border-right:1px solid var(--border)">${rows.map((p, i) => `<button class="evidence" data-p="${i}" style="width:100%;border:0;border-bottom:1px solid var(--border);background:${i === sel ? 'var(--surface-2)' : 'transparent'};padding:12px 14px;cursor:pointer;text-align:left">
                        <span class="ico">📄</span><span class="txt"><b style="font-weight:550">${esc(p.label)}</b><small>${p.state === 'done' ? 'Emitido' : p.state === 'late' ? 'No emitido a tiempo' : 'En elaboración'}</small></span>
                        ${p.state === 'done' ? badge('Emitido', 'ok') : p.state === 'late' ? badge('Atrasado', 'bad') : badge('En curso', 'warn')}</button>`).join('')}</div>
                    <div class="card-b" style="display:grid;gap:12px;align-content:start">
                        <div style="display:flex;align-items:center;gap:10px"><h3>${esc(r.label)}</h3><span class="muted small">${done} de ${r.sections.length} secciones</span>
                            <div style="margin-left:auto;display:flex;gap:8px"><button class="btn sm" data-prev>Vista previa</button>${r.state !== 'done' ? `<button class="btn primary sm" data-emit ${done < r.sections.length ? 'disabled title="Complete todas las secciones"' : ''}>Emitir informe</button>` : ''}</div></div>
                        ${bar(done / r.sections.length)}
                        <div class="checklist">${c.sections.map((s, i) => `<label class="check ${r.sections[i] ? 'done' : ''}"><input type="checkbox" data-s="${i}" ${r.sections[i] ? 'checked' : ''} ${r.state === 'done' ? 'disabled' : ''}><span>${esc(s)}</span></label>`).join('')}</div>
                    </div></div>`;
            $$('[data-p]', card).forEach((b) => b.addEventListener('click', () => { sel = Number(b.dataset.p); draw(); }));
            $$('[data-s]', card).forEach((b) => b.addEventListener('change', () => { r.sections[Number(b.dataset.s)] = b.checked; draw(); }));
            $('[data-prev]', card).addEventListener('click', () => toast('Prototipo: abriría el informe en PDF'));
            const emit = $('[data-emit]', card);
            if (emit) emit.addEventListener('click', () => modal(`Emitir ${r.label}`, `${field('Fecha de emisión', `<input type="date" value="${YEAR}-11-24">`)}${field('Entregado a', '<input type="text" value="Gerencia general">')}${dropzone.replace('la evidencia', 'la constancia de recepción')}`, () => { r.state = 'done'; draw(); ctx.refresh(); toast('Informe emitido (prototipo)'); }, 'Emitir'));
        }
        draw();
        return card;
    };

    VIEWS.controls = function (item, ctx) {
        const LEVELS = ['Eliminación', 'Sustitución', 'Ingeniería', 'Administrativo', 'EPP'];
        const card = document.createElement('div');
        card.className = 'card';
        function draw() {
            const rows = ctx.state.data;
            const byLevel = LEVELS.map((l) => rows.filter((r) => r.control === l).length);
            card.innerHTML = `
                <div class="card-h"><h2>Plan de control de riesgos</h2><span class="sub">${rows.filter((r) => r.state === 'Implementada').length} de ${rows.length} medidas implementadas</span>
                    <div class="actions"><button class="btn primary sm" data-new>+ Nueva medida</button></div></div>
                <div class="card-b" style="display:flex;gap:6px;flex-wrap:wrap;align-items:end">
                    ${LEVELS.map((l, i) => `<div style="flex:1;min-width:110px;text-align:center"><div style="height:${18 + byLevel[i] * 14}px;background:${i < 3 ? 'var(--ok-bg)' : 'var(--warn-bg)'};border-radius:6px;display:grid;place-items:center;font-weight:700">${byLevel[i]}</div><div class="small muted" style="margin-top:4px">${i + 1}. ${l}</div></div>`).join('')}
                </div>
                <div class="table-wrap"><table>
                    <thead><tr><th>Peligro / riesgo</th><th>Nivel</th><th>Jerarquía</th><th>Medida</th><th>Responsable</th><th>Plazo</th><th>Estado</th></tr></thead>
                    <tbody>${rows.map((r, i) => `<tr><td><b style="font-weight:550">${esc(r.hazard)}</b></td>
                        <td>${badge(r.level, r.level === 'Intolerable' ? 'bad' : r.level === 'Importante' ? 'warn' : '')}</td>
                        <td>${esc(r.control)}</td><td>${esc(r.measure)}</td>
                        <td class="small">${esc(r.owner[0].split(' ')[0] + ' ' + r.owner[1].split(' ')[0])}</td><td>${esc(r.due)}</td>
                        <td><select data-st="${i}" style="width:auto">${['Planificada', 'En curso', 'Implementada', 'Vencida'].map((s) => `<option ${s === r.state ? 'selected' : ''}>${s}</option>`).join('')}</select></td></tr>`).join('')}</tbody></table></div>`;
            $$('[data-st]', card).forEach((s) => s.addEventListener('change', () => { rows[Number(s.dataset.st)].state = s.value; draw(); ctx.refresh(); }));
            $('[data-new]', card).addEventListener('click', () => modal('Nueva medida de control', `${field('Peligro / riesgo', '<input type="text" data-h>')}${field('Nivel de riesgo', '<select data-l><option>Moderado</option><option>Importante</option><option>Intolerable</option></select>')}${field('Nivel de la jerarquía', `<select data-c>${LEVELS.map((l) => `<option>${l}</option>`).join('')}</select>`)}${field('Medida', '<input type="text" data-me>')}${field('Plazo', `<input type="date" value="${YEAR}-12-31">`)}<div class="notice info">Elija primero el nivel más alto posible: eliminación → sustitución → ingeniería → administrativo → EPP.</div>`, (bg) => {
                rows.push({ hazard: $('[data-h]', bg).value || 'Nuevo riesgo', level: $('[data-l]', bg).value, control: $('[data-c]', bg).value, measure: $('[data-me]', bg).value || '—', state: 'Planificada', due: `31/12/${YEAR}`, owner: PEOPLE[4] });
                draw(); ctx.refresh();
            }, 'Agregar'));
        }
        draw();
        return card;
    };

    VIEWS.document = function (item, ctx) {
        const c = item.config;
        const STAGES = ['Borrador', 'En revisión', 'Aprobado', 'Vigente'];
        const wrap = document.createElement('div');
        wrap.className = 'stack';
        function draw() {
            const st = ctx.state.data;
            const done = st.checks.filter(Boolean).length;
            wrap.innerHTML = `
                <div class="card"><div class="card-h"><h2>Estado del documento</h2>
                    <div class="actions">${st.stage < 3 ? `<button class="btn primary sm" data-next ${st.stage === 1 && done < st.checks.length ? 'disabled title="Complete los contenidos mínimos"' : ''}>${['Enviar a revisión', 'Aprobar', 'Publicar como vigente'][st.stage]}</button>` : badge('Vigente hasta 31/12/2027', 'ok')}</div></div>
                    <div class="card-b"><div class="stepper">${STAGES.map((s, i) => `<div class="st ${i < st.stage || st.stage === 3 ? 'done' : i === st.stage ? 'current' : ''}">${s}</div>`).join('')}</div></div></div>
                <div class="card"><div class="card-h"><h2>Contenidos mínimos</h2><span class="sub">${done} de ${st.checks.length} · marque cada contenido cuando esté incluido</span></div>
                    <div class="card-b"><div class="checklist">${c.checklist.map((t, i) => `<label class="check ${st.checks[i] ? 'done' : ''}"><input type="checkbox" data-c="${i}" ${st.checks[i] ? 'checked' : ''}><span>${esc(t)}</span></label>`).join('')}</div></div></div>
                <div class="card"><div class="card-h"><h2>Documentos y versiones</h2><div class="actions"><button class="btn sm" data-up>Subir nueva versión</button></div></div>
                    <div class="table-wrap"><table><thead><tr><th>Documento</th><th>Versión</th><th>Fecha</th><th>Elaborado por</th><th>Estado</th></tr></thead>
                    <tbody>${(c.documents || []).map((d, i) => `<tr><td>📄 ${esc(d)}</td><td>v${3 - i}.0</td><td>${12 + i}/11/${YEAR}</td><td>${esc(item.resp === 'M' ? 'Monitor SHT' : 'Médico ocupacional')}</td><td>${badge(STAGES[st.stage], st.stage === 3 ? 'ok' : 'warn')}</td></tr>`).join('')}
                    <tr><td class="muted">📄 ${esc((c.documents || ['Documento'])[0]).replace('2027', '2026').replace('2026', '2025')}</td><td class="muted">v1.0</td><td class="muted">10/12/${YEAR - 1}</td><td class="muted">—</td><td>${badge('Reemplazado')}</td></tr></tbody></table></div></div>`;
            $$('[data-c]', wrap).forEach((b) => b.addEventListener('change', () => { st.checks[Number(b.dataset.c)] = b.checked; if (st.stage === 3 && !b.checked) st.stage = 1; draw(); ctx.refresh(); }));
            const nx = $('[data-next]', wrap);
            if (nx) nx.addEventListener('click', () => { st.stage++; draw(); ctx.refresh(); toast(`Documento: ${STAGES[st.stage]} (prototipo)`); });
            $('[data-up]', wrap).addEventListener('click', () => modal('Subir nueva versión', `${field('Documento', `<select>${(c.documents || []).map((d) => `<option>${esc(d)}</option>`).join('')}</select>`)}${field('Cambios de esta versión', '<textarea rows="2"></textarea>')}${dropzone}`, () => toast('Versión subida (prototipo)'), 'Subir'));
        }
        draw();
        return wrap;
    };

    // ───────────── página de ítem ─────────────
    function renderItem(id) {
        const item = S.ITEMS.find((i) => i.id === id);
        const cat = getCategory();
        const applies = item.categories.includes(cat);
        const root = $('#app');
        const ctx = { state: buildState(item) };
        document.title = `${item.id} · ${item.name} – Prototipo SISAT`;

        root.innerHTML = `
            ${topbar(cat, '../../')}
            <main class="page">
                <nav class="crumbs"><a href="../../index.html">Dashboard de cumplimiento</a><span>/</span><span>${esc(item.componentName)}</span>${item.sub ? `<span>/</span><span>${esc(item.sub)}</span>` : ''}<span>/</span><span>${esc(item.id)}</span></nav>
                <section class="card item-head">
                    <div>
                        <div class="item-code"><b>${esc(item.id)}</b>${esc(item.componentName)}${item.sub ? ' · ' + esc(item.sub) : ''}</div>
                        <h1>${esc(item.name)}</h1>
                        <div class="meta-row">
                            <span>Responsable: <b>${esc(S.STAFF[item.resp])}</b></span>
                            <span>Apoyo: <b>${esc(S.STAFF[item.support])}</b></span>
                            <span>Base legal: <b>${esc(item.legal)}</b></span>
                            <span style="display:inline-flex;gap:6px;align-items:center">Categorías: ${catsHtml(item, cat)}</span>
                        </div>
                        ${applies ? '' : `<div class="notice" style="margin-top:12px">Este ítem no es obligatorio para la categoría ${cat}. Se muestra solo como referencia.</div>`}
                    </div>
                    <div data-gauge></div>
                </section>
                <section><div class="kpis" data-kpis></div></section>
                <div class="grid-2">
                    <div class="stack" data-work></div>
                    <aside class="stack" data-side></aside>
                </div>
            </main>`;

        $('[data-work]').appendChild(VIEWS[item.pattern](item, ctx));
        renderSide(item, ctx);

        ctx.refresh = function () {
            const values = indicatorValues(item, ctx.state);
            const score = itemScore(values);
            $('[data-gauge]').innerHTML = gauge(score, 'del ítem');
            $('[data-kpis]').innerHTML = values.map((v) => `
                <div class="kpi">
                    <div class="kpi-id"><span>${esc(v.def.id)} · peso ${v.def.weight}</span>${v.live ? '<span class="live">en vivo</span>' : ''}</div>
                    <div class="kpi-name">${esc(v.def.name)}</div>
                    <div class="kpi-val"><strong class="tone-${toneFor(v.score)}">${pct(v.value)}</strong><span class="kpi-frac">${v.num} / ${v.den}</span></div>
                    ${bar(v.value, v.def.meta)}
                    <div class="kpi-foot"><span>Meta ${v.def.meta} % · ${esc(v.def.freq)}</span><span>${stateLabel(v.score)}</span></div>
                    <div class="small muted" title="Fórmula">${esc(v.def.num)} ÷ ${esc(v.def.den)}</div>
                </div>`).join('');
        };
        ctx.refresh();
    }

    function renderSide(item, ctx) {
        const side = $('[data-side]');
        const rng = rngFor(item.id + ':ev');
        side.innerHTML = `
            <div class="card"><div class="card-h"><h2>Cómo se resuelve</h2></div><div class="card-b"><ol class="steps">${item.steps.map((s) => `<li><span>${esc(s)}</span></li>`).join('')}</ol></div></div>
            ${ctx.state.checklist ? `<div class="card" data-chk></div>` : ''}
            <div class="card"><div class="card-h"><h2>Evidencias requeridas</h2></div><div class="card-b" style="padding-top:4px;padding-bottom:4px">
                ${item.evidences.map((e) => { const ok = rng() < 0.7; return `<div class="evidence"><span class="ico">${ok ? '📄' : '⏳'}</span><span class="txt">${esc(e)}<small>${ok ? `Cargado el ${date(rng, 6, NOW_MONTH)}` : 'Pendiente de carga'}</small></span>${ok ? badge('Cargado', 'ok') : '<button class="btn sm" data-upload>Subir</button>'}</div>`; }).join('')}
            </div></div>
            ${item.results && item.results.length ? `<div class="card"><div class="card-h"><h2>Indicadores de resultado</h2><span class="sub">No suman al cumplimiento</span></div><div class="card-b" style="display:grid;gap:14px">${item.results.map((r) => resultCard(r, item)).join('')}</div></div>` : ''}
            <div class="card"><div class="card-h"><h2>Para el desarrollo</h2></div><div class="card-b small" style="display:grid;gap:6px">
                <div><span class="muted">Ruta en el sistema:</span> <code>/sisat/{empresa}/${esc(item.component.replace(/_/g, '-'))}/${esc(item.slug.replace(/_/g, '-'))}</code></div>
                <div><span class="muted">Slug de actividad:</span> <code>${esc(item.slug)}</code></div>
                <div><span class="muted">Tipo de pantalla:</span> ${esc(PATTERN_NAMES[item.pattern])}</div>
                <div><span class="muted">Cálculo del ítem:</span> promedio ponderado de mín(valor ÷ meta, 1) de sus indicadores.</div>
            </div></div>`;
        $$('[data-upload]', side).forEach((b) => b.addEventListener('click', () => modal('Subir evidencia', dropzone, () => toast('Evidencia cargada (prototipo)'), 'Subir')));
        const chk = $('[data-chk]', side);
        if (chk) {
            const draw = () => {
                const st = ctx.state.checklist;
                chk.innerHTML = `<div class="card-h"><h2>Requisitos</h2><span class="sub">${st.filter(Boolean).length} de ${st.length}</span></div><div class="card-b"><div class="checklist">${item.config.checklist.map((t, i) => `<label class="check ${st[i] ? 'done' : ''}"><input type="checkbox" data-k="${i}" ${st[i] ? 'checked' : ''}><span>${esc(t)}</span></label>`).join('')}</div></div>`;
                $$('[data-k]', chk).forEach((b) => b.addEventListener('change', () => { st[Number(b.dataset.k)] = b.checked; draw(); ctx.refresh(); }));
            };
            draw();
        }
    }

    const PATTERN_NAMES = {
        workers: 'Cobertura por trabajador (tabla de nómina con estado)',
        matrix: 'Matriz de verificación (filas × requisitos)',
        schedule: 'Cronograma de inspecciones o verificaciones',
        cases: 'Registro de casos con flujo por etapas',
        program: 'Programa de actividades con participación',
        report: 'Informes periódicos con secciones',
        controls: 'Plan de control de riesgos por jerarquía',
        document: 'Documento con contenidos mínimos y aprobación',
    };

    function resultCard(r, item) {
        const rng = rngFor(item.id + r.name);
        const pts = Array.from({ length: 8 }, (_, i) => 40 + rng() * 30 - i * 2.5);
        const max = Math.max(...pts), min = Math.min(...pts);
        const path = pts.map((v, i) => `${(i / 7) * 200},${36 - ((v - min) / (max - min || 1)) * 30}`).join(' ');
        const last = (pts[7] / 10).toFixed(2);
        return `<div style="display:grid;gap:4px"><div style="display:flex;justify-content:space-between"><b style="font-weight:550">${esc(r.name)}</b><span class="tone-ok small">▼ tendencia</span></div>
            <div style="display:flex;align-items:center;gap:12px"><strong style="font-size:20px">${r.unit === 'casos' ? 0 : last}</strong><svg viewBox="0 0 200 40" width="100%" height="40" preserveAspectRatio="none" aria-hidden="true"><polyline points="${path}" fill="none" stroke="currentColor" stroke-width="2" opacity=".7"/></svg></div>
            <div class="small muted">${esc(r.formula)} · Meta: ${esc(r.target)}</div></div>`;
    }

    function topbar(cat, base) {
        return `<header class="topbar"><a class="brand" href="${base}index.html">SISAT Manager</a><span class="proto-tag">Prototipo estático · datos de ejemplo</span>
            <div class="company"><span>${esc(COMPANY.name)}</span><span class="muted">·</span><span>Categoría</span>
            <span class="chips">${CATS.map((c) => `<a class="chip ${c === cat ? 'on' : ''}" href="?cat=${c}">${c}</a>`).join('')}</span></div></header>`;
    }

    // ───────────── dashboard ─────────────
    function renderDashboard() {
        const cat = getCategory();
        const root = $('#app');
        const scores = {};
        S.ITEMS.forEach((it) => { scores[it.id] = itemScore(indicatorValues(it, buildState(it))); });
        const applicable = S.ITEMS.filter((it) => it.categories.includes(cat));
        const global = applicable.reduce((a, it) => a + scores[it.id], 0) / applicable.length;
        const count = (f) => applicable.filter((it) => f(scores[it.id])).length;
        const catInfo = S.CATEGORIES.find((c) => c.key === cat);
        const results = [];
        S.ITEMS.forEach((it) => (it.results || []).forEach((r) => { if (it.categories.includes(cat)) results.push([r, it]); }));

        root.innerHTML = `
            ${topbar(cat, '')}
            <main class="page">
                <section class="card dash-head">
                    ${gauge(global, 'global')}
                    <div style="display:grid;gap:14px">
                        <div><h1>Cumplimiento SISAT</h1><p class="muted" style="margin-top:4px">${esc(COMPANY.name)} · RUC ${COMPANY.ruc} · CIIU ${esc(COMPANY.ciiu)} · ${COMPANY.workers} trabajadores · <b>Categoría ${cat}</b> (${esc(catInfo.name)}, ${esc(catInfo.range)})</p></div>
                        <div class="stats">
                            <div class="stat"><strong>${applicable.length}</strong><span>Ítems aplicables de ${S.ITEMS.length}</span></div>
                            <div class="stat"><strong class="tone-ok">${count((s) => s >= 0.9)}</strong><span>Cumplen (≥ 90 %)</span></div>
                            <div class="stat"><strong class="tone-warn">${count((s) => s >= 0.6 && s < 0.9)}</strong><span>Parciales (60–89 %)</span></div>
                            <div class="stat"><strong class="tone-bad">${count((s) => s < 0.6)}</strong><span>No cumplen (&lt; 60 %)</span></div>
                        </div>
                    </div>
                </section>
                <div class="grid-2">
                    <div class="card"><div class="card-h"><h2>Ítems por componente</h2><span class="sub">Clic en un ítem para ver su prototipo</span>
                        <div class="actions"><div class="chips"><button class="chip on" data-show="app">Solo aplicables</button><button class="chip" data-show="all">Todos</button></div></div></div>
                        <div data-list></div></div>
                    <aside class="stack">
                        <div class="card"><div class="card-h"><h2>Por componente</h2></div><div class="card-b comp-list">${S.COMPONENTS.map((c) => {
                            const its = applicable.filter((it) => it.component === c.key);
                            if (!its.length) return `<div class="comp-row muted"><span>${c.number}. ${esc(c.name)}</span><span class="small">No aplica</span><span></span></div>`;
                            const s = its.reduce((a, it) => a + scores[it.id], 0) / its.length;
                            return `<div class="comp-row"><span>${c.number}. ${esc(c.name)} <span class="muted small">· ${its.length}</span></span>${bar(s)}<b class="tone-${toneFor(s)}">${Math.round(s * 100)}%</b></div>`;
                        }).join('')}</div></div>
                        <div class="card"><div class="card-h"><h2>Indicadores de resultado</h2><span class="sub">Tendencias, no suman al cumplimiento</span></div><div class="card-b" style="display:grid;gap:16px">${results.map(([r, it]) => resultCard(r, it)).join('') || '<span class="muted">No aplican a esta categoría.</span>'}</div></div>
                        <div class="card"><div class="card-h"><h2>Cómo se calcula</h2></div><div class="card-b small" style="display:grid;gap:6px">
                            <p>Indicador: valor = numerador ÷ denominador. Cumplimiento = mín(valor ÷ meta, 1).</p>
                            <p>Ítem: promedio ponderado de sus indicadores con datos.</p>
                            <p>Componente y global: promedio de los ítems aplicables a la categoría.</p>
                            <p class="muted">Fuente: Indicadores_SISAT_cumplimiento.xlsx</p></div></div>
                    </aside>
                </div>
            </main>`;

        let mode = 'app';
        const list = $('[data-list]');
        function drawList() {
            list.innerHTML = S.COMPONENTS.map((c) => {
                const its = S.ITEMS.filter((it) => it.component === c.key && (mode === 'all' || it.categories.includes(cat)));
                if (!its.length) return '';
                return `<div class="comp-group"><h3>${c.number}. ${esc(c.name)}</h3>${its.map((it) => {
                    const s = scores[it.id], ok = it.categories.includes(cat);
                    return `<a class="item-row ${ok ? '' : 'na'}" href="${it.path}/index.html?cat=${cat}">
                        <span class="id">${esc(it.id)}</span><span>${esc(it.name)}</span>
                        <span class="small muted hide-sm">${esc(it.resp === 'S' ? 'Prof. de la salud' : it.resp === 'M' ? 'Monitor SHT' : 'Monitor y salud')}</span>
                        <span class="hide-sm">${ok ? bar(s) : ''}</span>
                        <b class="tone-${ok ? toneFor(s) : ''}">${ok ? Math.round(s * 100) + '%' : ''}</b>
                        <span>${ok ? badge(stateLabel(s), toneFor(s)) : badge('No aplica')}</span></a>`;
                }).join('')}</div>`;
            }).join('');
        }
        $$('[data-show]').forEach((b) => b.addEventListener('click', () => { mode = b.dataset.show; $$('[data-show]').forEach((x) => x.classList.toggle('on', x === b)); drawList(); }));
        drawList();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const id = document.body.dataset.item;
        if (id) renderItem(id); else renderDashboard();
    });
})();
