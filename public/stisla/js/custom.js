/**
 * PDHI Banten II - Modern Interactive UI Enhancements
 */

"use strict";

// Standalone function available immediately in global scope
function togglePasswordVisibility(button) {
    if (!button) return;

    // Guard against rapid duplicate triggers / double-clicks (e.g. inline onclick + delegated listener)
    var now = Date.now();
    if (button._lastToggleTime && (now - button._lastToggleTime) < 250) {
        return;
    }
    button._lastToggleTime = now;

    var targetSelector = button.getAttribute('data-target') || '#password';
    var input = document.querySelector(targetSelector);
    if (!input) return;

    var willShowText = (input.type === 'password');
    input.type = willShowText ? 'text' : 'password';

    // Find icon - could be <i> or FontAwesome converted <svg>
    var icon = button.querySelector('i, svg');
    if (icon) {
        if (icon.tagName.toLowerCase() === 'svg') {
            var newI = document.createElement('i');
            newI.className = willShowText ? 'fas fa-eye-slash' : 'fas fa-eye';
            icon.parentNode.replaceChild(newI, icon);
            if (window.FontAwesome && window.FontAwesome.dom && window.FontAwesome.dom.i2svg) {
                window.FontAwesome.dom.i2svg({ node: button });
            }
        } else {
            if (willShowText) {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    }
}

// Attach globally
window.togglePasswordVisibility = togglePasswordVisibility;

$(document).ready(function () {
    // 1. Delegated jQuery Password Toggle Helper (fallback only for elements WITHOUT inline onclick)
    $(document).on('click', '[data-toggle="password"]:not([onclick])', function (e) {
        e.preventDefault();
        togglePasswordVisibility(this);
    });

    // 2. Mobile Sidebar Backdrop: tap outside to close sidebar on mobile
    if ($('.sidebar-backdrop').length === 0) {
        $('body').append('<div class="sidebar-backdrop"></div>');
    }

    $(document).on('click', '.sidebar-backdrop', function () {
        $('body').removeClass('sidebar-show').addClass('sidebar-gone');
    });

    // 3. Initialize Bootstrap Tooltips with touch safety
    if ($.fn.tooltip) {
        $('[data-toggle="tooltip"]').tooltip({
            trigger: 'hover',
            boundary: 'window'
        });
    }

    // 4. Ensure modals handle image scaling smoothly
    $('.modal').on('shown.bs.modal', function () {
        $(this).find('img').css({
            'max-width': '100%',
            'height': 'auto'
        });
    });

    // 5. Bootstrap Datepicker Initialization & Auto-Close Handlers
    if ($.fn.datepicker) {
        $.fn.datepicker.defaults.autoclose = true;
        $.fn.datepicker.defaults.todayHighlight = true;
        $.fn.datepicker.defaults.format = 'dd-mm-yyyy';
        $.fn.datepicker.defaults.orientation = 'bottom auto';
        $.fn.datepicker.defaults.enableOnReadonly = true;
        $.fn.datepicker.defaults.showOnFocus = true;

        // Initialize all datepicker instances with explicit autoclose
        $('.datepicker, [data-provide="datepicker"]').each(function () {
            var $el = $(this);
            var fmt = $el.data('date-format') || 'dd-mm-yyyy';
            $el.datepicker({
                format: fmt,
                autoclose: true,
                todayHighlight: true,
                orientation: 'bottom auto',
                enableOnReadonly: true
            });
        });

        // Close immediately when user chooses a date
        $(document).on('changeDate', '.datepicker, [data-provide="datepicker"]', function () {
            $(this).datepicker('hide');
        });

        // Toggle datepicker on calendar button click
        $(document).on('click', '.input-group.date .input-group-append, .input-group.date .input-group-text', function (e) {
            e.preventDefault();
            var $group = $(this).closest('.input-group.date');
            var picker = $group.data('datepicker') || $group.find('input').data('datepicker');
            if (picker) {
                if ($('.datepicker-dropdown:visible').length) {
                    $group.datepicker('hide');
                } else {
                    $group.datepicker('show');
                }
            } else {
                $group.find('input').focus();
            }
        });

        // Close datepicker when clicking outside
        $(document).on('click touchstart', function (e) {
            if (!$(e.target).closest('.datepicker, .input-group.date, [data-provide="datepicker"], .datepicker-dropdown').length) {
                $('.datepicker-dropdown').hide();
                $('[data-provide="datepicker"]').datepicker('hide');
            }
        });
    }

    // 6. Puppy Paw Trail Cursor Chaser (Desktop & Login Page Only)
    (function initPuppyPawTrail() {
        // Only run on the login page
        if (!document.body.classList.contains('auth-login-page')) {
            return;
        }

        // Run strictly on devices with hover + fine pointer (mouse / desktop)
        if (!window.matchMedia || !window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            return;
        }
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        var mouseX = -100;
        var mouseY = -100;
        var puppyX = -100;
        var puppyY = -100;
        var lastStepX = -100;
        var lastStepY = -100;
        var isLeftPaw = false;
        var initialized = false;

        var STEP_DISTANCE = 34; // Distance in px between consecutive paw prints
        var PAW_LIFETIME = 900;  // Milliseconds before paw element is removed

        var container = document.createElement('div');
        container.className = 'paw-trail-container';
        document.body.appendChild(container);

        function spawnPaw(x, y, angle) {
            var paw = document.createElement('div');
            paw.className = 'paw-trail-print';
            paw.style.left = Math.round(x) + 'px';
            paw.style.top = Math.round(y) + 'px';
            paw.style.setProperty('--paw-rot', Math.round(angle) + 'deg');
            paw.innerHTML = '<i class="fas fa-paw"></i>';
            container.appendChild(paw);

            setTimeout(function () {
                if (paw.parentNode) {
                    paw.parentNode.removeChild(paw);
                }
            }, PAW_LIFETIME);
        }

        function updateLoop() {
            if (initialized) {
                var dx = mouseX - puppyX;
                var dy = mouseY - puppyY;
                var dist = Math.sqrt(dx * dx + dy * dy);

                // If puppy hasn't caught up with cursor yet
                if (dist > 8) {
                    // Smooth chasing easing toward cursor
                    var speed = Math.min(dist * 0.14, 18);
                    var moveX = (dx / dist) * speed;
                    var moveY = (dy / dist) * speed;

                    puppyX += moveX;
                    puppyY += moveY;

                    // Distance traveled since last paw step
                    var stepDist = Math.hypot(puppyX - lastStepX, puppyY - lastStepY);
                    if (stepDist >= STEP_DISTANCE) {
                        // Angle in degrees (FontAwesome paw icon points upward by default, so +90deg aligns with forward movement)
                        var angle = (Math.atan2(moveY, moveX) * (180 / Math.PI)) + 90;

                        // Perpendicular offset for alternating left and right footsteps
                        var norm = Math.sqrt(moveX * moveX + moveY * moveY);
                        var perpX = -moveY / norm;
                        var perpY = moveX / norm;
                        var offset = (isLeftPaw ? -1 : 1) * 8;

                        spawnPaw(puppyX + (perpX * offset), puppyY + (perpY * offset), angle);

                        isLeftPaw = !isLeftPaw;
                        lastStepX = puppyX;
                        lastStepY = puppyY;
                    }
                }
            }

            requestAnimationFrame(updateLoop);
        }

        window.addEventListener('mousemove', function (e) {
            mouseX = e.clientX;
            mouseY = e.clientY;

            if (!initialized) {
                // Initialize puppy slightly behind cursor so chasing begins naturally
                puppyX = mouseX - 35;
                puppyY = mouseY - 35;
                lastStepX = puppyX;
                lastStepY = puppyY;
                initialized = true;
            }
        }, { passive: true });

        requestAnimationFrame(updateLoop);
    })();

    // 7. Interactive Login Mascots (Left Puppy Peek & Right Cat Arm Reach)
    (function initLoginMascots() {
        if (!document.body.classList.contains('auth-login-page')) {
            return;
        }
        if (!window.matchMedia || !window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
            return;
        }
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        var puppyEl = document.getElementById('login-puppy-peek');
        var catEl = document.getElementById('login-cat-reach');
        var cardWrapper = document.querySelector('.login-card-wrapper');

        if (!puppyEl || !catEl || !cardWrapper) {
            return;
        }

        var isLeftActive = false;
        var isRightActive = false;
        var targetPuppyX = -10;
        var currentPuppyX = 20;
        var targetPuppyY = 0;
        var currentPuppyY = 0;
        var targetPuppyRot = 0;
        var currentPuppyRot = -5;

        var targetCatX = 10;
        var currentCatX = -20;
        var targetCatY = 0;
        var currentCatY = 0;
        var targetCatRot = 0;
        var currentCatRot = 5;

        var animationRunning = false;

        function updateMascotFrames() {
            var needsNextFrame = false;

            // Smooth puppy interpolation
            if (isLeftActive) {
                currentPuppyX += (targetPuppyX - currentPuppyX) * 0.18;
                currentPuppyY += (targetPuppyY - currentPuppyY) * 0.18;
                currentPuppyRot += (targetPuppyRot - currentPuppyRot) * 0.18;

                puppyEl.style.setProperty('--puppy-x', Math.round(currentPuppyX) + 'px');
                puppyEl.style.setProperty('--puppy-y', Math.round(currentPuppyY) + 'px');
                puppyEl.style.setProperty('--puppy-rot', Math.round(currentPuppyRot) + 'deg');
                needsNextFrame = true;
            }

            // Smooth cat arm interpolation
            if (isRightActive) {
                currentCatX += (targetCatX - currentCatX) * 0.18;
                currentCatY += (targetCatY - currentCatY) * 0.18;
                currentCatRot += (targetCatRot - currentCatRot) * 0.18;

                catEl.style.setProperty('--cat-x', Math.round(currentCatX) + 'px');
                catEl.style.setProperty('--cat-y', Math.round(currentCatY) + 'px');
                catEl.style.setProperty('--cat-rot', Math.round(currentCatRot) + 'deg');
                needsNextFrame = true;
            }

            if (needsNextFrame) {
                requestAnimationFrame(updateMascotFrames);
            } else {
                animationRunning = false;
            }
        }

        function triggerFrameLoop() {
            if (!animationRunning) {
                animationRunning = true;
                requestAnimationFrame(updateMascotFrames);
            }
        }

        window.addEventListener('mousemove', function (e) {
            var rect = cardWrapper.getBoundingClientRect();
            var mouseX = e.clientX;
            var mouseY = e.clientY;

            // Check if cursor is on left side outside the card
            if (mouseX < rect.left) {
                var leftDist = rect.left - mouseX;

                isLeftActive = true;
                puppyEl.classList.add('is-peeking');

                // Puppy extension: translates out boldly between -35px and -150px
                var peekRatio = Math.min(Math.max((leftDist - 10) / 180, 0), 1);
                targetPuppyX = -35 - (peekRatio * 115);

                // Vertical follow: tilt side-POV head toward mouse (centered with middle card position)
                var relY = mouseY - (rect.top + rect.height * 0.48);
                targetPuppyY = Math.max(Math.min(relY * 0.2, 50), -50);
                targetPuppyRot = Math.max(Math.min(relY * 0.08, 14), -14);

                // Maximum reach check: when cursor is past puppy's reach (> 185px away)
                if (leftDist >= 185) {
                    puppyEl.classList.add('is-max-reach');
                } else {
                    puppyEl.classList.remove('is-max-reach');
                }

                // Deactivate right side
                if (isRightActive) {
                    isRightActive = false;
                    catEl.classList.remove('is-reaching', 'is-max-reach');
                }

                triggerFrameLoop();
            }
            // Check if cursor is on right side outside the card
            else if (mouseX > rect.right) {
                var rightDist = mouseX - rect.right;

                isRightActive = true;
                catEl.classList.add('is-reaching');

                // Cat arm extension: translates out boldly between 35px and 150px
                var reachRatio = Math.min(Math.max((rightDist - 10) / 200, 0), 1);
                targetCatX = 35 + (reachRatio * 115);

                // Vertical aim: arm points towards mouse
                var relY = mouseY - (rect.top + rect.height * 0.42);
                targetCatY = Math.max(Math.min(relY * 0.28, 65), -65);
                targetCatRot = Math.max(Math.min(relY * 0.14, 30), -30);

                // Maximum reach check: when cursor is past cat reach (> 205px away)
                if (rightDist >= 205) {
                    catEl.classList.add('is-max-reach');
                } else {
                    catEl.classList.remove('is-max-reach');
                }

                // Deactivate left side
                if (isLeftActive) {
                    isLeftActive = false;
                    puppyEl.classList.remove('is-peeking', 'is-max-reach');
                }

                triggerFrameLoop();
            }
            // Cursor is hovering directly over the login card (or inside bounds)
            else {
                if (isLeftActive) {
                    isLeftActive = false;
                    puppyEl.classList.remove('is-peeking', 'is-max-reach');
                }
                if (isRightActive) {
                    isRightActive = false;
                    catEl.classList.remove('is-reaching', 'is-max-reach');
                }
            }
        }, { passive: true });

        // Retract both when mouse leaves browser window
        document.addEventListener('mouseleave', function () {
            isLeftActive = false;
            isRightActive = false;
            puppyEl.classList.remove('is-peeking', 'is-max-reach');
            catEl.classList.remove('is-reaching', 'is-max-reach');
        });
    })();
});
